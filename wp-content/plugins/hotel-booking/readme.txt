=== Hotel Booking ===
Contributors: MotoPress
Donate link: http://www.getmotopress.com/
Tags: hotel, booking, reservation
Requires at least: 4.0
Tested up to: 4.8
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Manage your hotel booking services.

== Description ==

Manage your hotel booking services. Perfect for hotels, villas, guest houses, hostels, and apartments of all sizes.

== Installation ==

1. Upload the MotoPress plugin to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Screenshots ==


== Changelog ==

= 2.1.1 =
* Bug fix: fixed the placeholder of posts titles.

= 2.1.0 =
* Added the ability to create and apply coupon codes.

= 2.0.0 =
* Note: This release will perform an upgrade process on the database in the background.
* Note: This release adds new macros for email templates. Update your templates please. To reset an email template just remove the current text and save settings.
* Note: This release doesn't limit the number of adults and children in the Search availability form. Please update "Max Adults" and "Max Children" number in plugin settings.

* The updated plugin allows guests reserve and pay for several (more than one) accommodation types during one reservation process.
* Search results page was updated: guests can choose and add several accommodation types into one reservation.
* On the search results page, the plugin displays all recommended accommodations according to the number of guests specified in a search request. This option can be turned off.
* Email templates were updated to support Multiple booking.
* Admin page descriptions were updated to ease the work with the plugin.
* Bug fix: fixed the issue with saving check-in and check-out dates in Settings.
* Improved compatibility with Jetpack gallery and lightbox modules.
* Added a theme-friendly pagination option that allows specify the number of posts per page for accommodations and services.
* A cancellation email template is available as a separate macro - it's used when a booking cancellation option is turned on.
* A Price Breakdown Table on the Booking confirmation page was updated: it's now smaller with the ability to expend details of each booked accommodation.
* Updated the list of data your guests are required to provide when submitting a booking. Admins can set it to: no data required / country required / full address required. Please choose the preferable option.
* 15 new themes were added to calendar to fit your theme design much better.
* New filters, actions and CSS classes were added for developers.


= 1.2.3 =
* Added the ability to receive payments through Beanstream/Bambora payment gateway.

= 1.2.2 =
* Added the ability to receive payments through Braintree payment gateway.

= 1.2.1 =
* Bug fix: fixed the issue of undelivered emails after booking placement.
* Bug fix: fixed the issue of booking calendar localization.

= 1.2.0 =
* New algorithm of displaying accommodation pricing:
- it displays minimum available price of accommodation for dates set in the search form by visitor;
- it displays minimum available price of accommodation from the day of visit and for the next fixed number of days predefined in settings (if dates are not chosen by visitor);
- it displays a total price for chosen dates or the price of "minimum days to stay" set in settings.

* Added the ability to create a payment manually. Usefull feature to keep all your finances in one place.
* Added the ability to search booking by email or ID in the list of bookings.
* Added the ability to filter payments by status and search them by email or ID in the list of payments.
* Added a new email template to notify Administrator about new booking, which is paid and confirmed.
* Added the ability to enable comments for accommodation and services on the frontend.
* Thumbnail size of accommodation gallery is set to 'thumbnail' to make all images the same size.
* Bug fix: fixed an issue when rates list displayed rates in the past on the frontend.
* Bug fix: fixed an issue when price of the service was displayed twice.
* Added new Arabic language files.

= 1.1.0 =
* Added the ability to receive payments through PayPal, 2Checkout and Stripe gateways.
* Made the plugin multilingual ready.
* Added translation into 13 languages (Portuguese, Polish, Russian, Spanish, Turkish, Swedish, Italian, Hungarian, Czech, Chinese, Dutch, French, German).

= 1.0.1 =
* Added the ability to input dates via keyboard
* Added the ability to duplicate Rate
* Added the ability to choose date format in plugin Settings

= 1.0.0 =
* Initial release