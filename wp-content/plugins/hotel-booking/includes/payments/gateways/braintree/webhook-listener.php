<?php

namespace MPHB\Payments\Gateways\Braintree;

use \Braintree\Exception as BraintreeException;
use \Braintree\Transaction;
use \Braintree\TransactionSearch;
use \Braintree\WebhookNotification;
use \MPHB\Payments\Gateways;

class WebhookListener extends Gateways\AbstractNotificationListener {

	/**
	 * 
	 * @var \Braintree\WebhookNotification
	 */
	private $validNotification;

	/**
	 * 
	 * @var array
	 */
	private $payments;

	public function __construct( $args = array() ){
		parent::__construct( $args );
	}

	protected function initUrlIdentificationValue(){
		return 'braintree';
	}

	protected function validate( $input ){

		if ( !isset( $input['bt_signature'], $input['bt_payload'] ) ) {
			return false;
		}

		$allowedWebhooks = array(
			WebhookNotification::DISPUTE_OPENED,
			WebhookNotification::DISPUTE_LOST,
			WebhookNotification::DISPUTE_WON,
			WebhookNotification::DISBURSEMENT
		);

		try {
			/** @throws BraintreeException */
			$notification = WebhookNotification::parse( $input['bt_signature'], $input['bt_payload'] );

			if ( in_array( $notification->kind, $allowedWebhooks ) ) {
				$this->validNotification = $notification;
				return true;
			} else {
				return false;
			}
		} catch ( BraintreeException $e ) {
			return false;
		}
	}

	/**
	 *
	 * @return \MPHB\Entities\Payment|null
	 */
	protected function retrievePayment(){

		switch ( $this->validNotification->kind ) {

			case WebhookNotification::DISPUTE_OPENED :
			case WebhookNotification::DISPUTE_LOST :
			case WebhookNotification::DISPUTE_WON :

				$transactionId = $this->validNotification->dispute->transactionDetails->id;
				$this->payments = $this->retrievePayments( array( $transactionId ) );

				break;

			case WebhookNotification::DISBURSEMENT :

				$transactionIds = $this->validNotification->disbursement->transactionIds;
				$this->payments = $this->retrievePayments( $transactionIds );

				break;

		}

		return ( !empty( $this->payments ) ? reset( $this->payments ) : null );
	}

	/**
	 *
	 * @param array $transactionIds
	 */
	private function retrievePayments( $transactionIds ){

		$payments = array();

		foreach ( $transactionIds as $transactionId ) {
			$paymentAtts = array(
				'transaction_id' => $transactionId,
				'gateway'		 => 'braintree'
			);

			$foundPayments = MPHB()->getPaymentRepository()->findAll( $paymentAtts );

			if ( !empty( $foundPayments ) ) {
				$payments[ $transactionId ] = reset( $foundPayments );
			}
		}

		return $payments;
	}

	protected function process(){

		switch ( $this->validNotification->kind ) {

			case WebhookNotification::DISPUTE_OPENED :

				$this->paymentLog( __( 'Payment dispute opened', 'motopress-hotel-booking' ) );

				break;

			case WebhookNotification::DISPUTE_LOST :

				$this->paymentRefunded( __( 'Payment dispute lost', 'motopress-hotel-booking' ) );

				break;

			case WebhookNotification::DISPUTE_WON :

				$this->paymentLog( __( 'Payment dispute won', 'motopress-hotel-booking' ) );

				break;

			case WebhookNotification::DISBURSEMENT :

				try {
					/** @throws \InvalidArgumentException */
					$query = TransactionSearch::ids()->in( array_keys( $this->payments ) );
					/** @throws BraintreeException */
					$transactions = Transaction::search( array( $query ) );

					foreach ( $transactions as $transaction ) {
						$this->payment = $this->payments[ $transaction->id ];

						switch ( $transaction->status ) {

							case Transaction::ESCROW_REFUNDED :
								$this->paymentLog( __( 'Payment refunded in Braintree', 'motopress-hotel-booking' ) );
								break;

							case Transaction::VOIDED :
								$this->paymentLog( __( 'Braintree transaction voided', 'motopress-hotel-booking' ) );
								break;

						}
					}
				} catch ( \Exception $e ) {
				}

				break;

		}
	}

	private function paymentLog( $log ){

		if ( !empty( $log ) ) {
			$this->payment->addLog( $log );

			MPHB()->getPaymentRepository()->save( $this->payment );
		}

		return true;
	}

	protected function paymentCompleted( $log ){

		$canComplete = MPHB()->postTypes()->payment()->statuses()->canStatusCompleted( $this->payment->getStatus() );

		if ( !empty( $log ) ) {
			$this->payment->addLog( $log );
		}

		if ( $canComplete ) {
			$this->payment->setStatus( \MPHB\PostTypes\PaymentCPT\Statuses::STATUS_COMPLETED );
		}

		MPHB()->getPaymentRepository()->save( $this->payment );

		return $canComplete;
	}

	protected function paymentRefunded( $log ){

		$canRefund = MPHB()->postTypes()->payment()->statuses()->canStatusRefunded( $this->payment->getStatus() );

		if ( !empty( $log ) ) {
			$this->payment->addLog( $log );
		}

		if ( $canRefund ) {
			$this->payment->setStatus( \MPHB\PostTypes\PaymentCPT\Statuses::STATUS_REFUNDED );
		}

		MPHB()->getPaymentRepository()->save( $this->payment );

		return $canRefund;
	}

	protected function paymentFailed( $log ){

		$canFail = MPHB()->postTypes()->payment()->statuses()->canStatusFailed( $this->payment->getStatus() );

		if ( !empty( $log ) ) {
			$this->payment->addLog( $log );
		}

		if ( $canFail ) {
			$this->payment->setStatus( \MPHB\PostTypes\PaymentCPT\Statuses::STATUS_FAILED );
		}

		MPHB()->getPaymentRepository()->save( $this->payment );

		return $canFail;
	}

	protected function paymentOnHold( $log ){

		$canHold = MPHB()->postTypes()->payment()->statuses()->canStatusOnHolded( $this->payment->getStatus() );

		if ( !empty( $log ) ) {
			$this->payment->addLog( $log );
		}

		if ( $canHold ) {
			$this->payment->setStatus( \MPHB\PostTypes\PaymentCPT\Statuses::STATUS_ON_HOLD );
		}

		MPHB()->getPaymentRepository()->save( $this->payment );

		return $canHold;
	}

}
