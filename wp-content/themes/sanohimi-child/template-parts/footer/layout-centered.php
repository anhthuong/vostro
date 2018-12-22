<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Sanohimi
 */
?>

<!--<div class="tm_pb_section  tm_pb_section_5 tm_pb_with_background tm_section_regular tm_section_transparent">
    <div class="container">
        <div class=" row tm_pb_row tm_pb_row_8">

            <div class="tm_pb_column tm_pb_column_1_2  tm_pb_column_16 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 tm_pb_vertical_alligment_start">

                <div id="tm_pb_contact_form_0" class="tm_pb_contact_form tm_pb_contact_form_0 tm_pb_contact_form_container clearfix tm_pb_module" data-form_unique_num="0"><h2 class="tm_pb_contact_main_title"></h2>
                    <form class="tm_pb_contact_form clearfix" method="post" action="http://localhost/vostro2/">
                        <div class="tm-pb-contact-message"></div>
                        <div class="row">
                            <div class="title-subscribe">Nhận thông tin từ chúng tôi</div>

                            <div class="tm_pb_contact_field col-md-6  tm_pb_contact_field_0">
                                <label for="tm_pb_contact_name_1" class="tm_pb_contact_form_label"></label>
                                <input type="text" id="tm_pb_contact_name_1" class="tm_pb_contact_form_input" value="" name="tm_pb_contact_name_1" placeholder="Họ tên *" data-required_mark="required" data-field_type="input" data-original_id="name" data-original_title=""></div>
                            <div class="tm_pb_contact_field col-md-6  tm_pb_contact_field_1">
                                <label for="tm_pb_contact_email_1" class="tm_pb_contact_form_label"></label>
                                <input type="email" id="tm_pb_contact_email_1" class="tm_pb_contact_form_input" value="" name="tm_pb_contact_email_1" placeholder="Email *" data-required_mark="required" data-field_type="email" data-original_id="email" data-original_title=""></div>

                        </div>
                        <input type="hidden" value="tm_contact_proccess" name="tm_pb_contactform_submit_0">
                        <input type="text" value="" name="tm_pb_contactform_validate_0" class="tm_pb_contactform_validate_field">
                        <div class="tm_contact_bottom_container">
                            <button type="submit" class="tm_pb_contact_submit tm_pb_button">Submit</button>	</div>
                        <input type="hidden" id="_wpnonce-tm-pb-contact-form-submitted" name="_wpnonce-tm-pb-contact-form-submitted" value="127e6c1208"><input type="hidden" name="_wp_http_referer" value="/vostro2/"></form></div> .tm_pb_contact_form 
            </div>  .tm_pb_column <div class="tm_pb_column tm_pb_column_1_2  tm_pb_column_17 tm_pb_column_empty col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 tm_pb_vertical_alligment_start">


            </div>  .tm_pb_column 

        </div>  .tm_pb_row 
    </div>
</div>-->
<div class="footer-container invert">
    <div <?php echo sanohimi_get_container_classes(array('site-info'), 'footer'); ?>>
        <div class="container">
            <div class=" row tm_pb_row tm_pb_row_1">
                <div class="tm_pb_column tm_pb_column_1_2  tm_pb_column_1 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 footer-wrap-left">
                    <div class="footer-logo-left"><?php sanohimi_footer_logo(); ?></div>
                    <div class="footer-social-left"><?php sanohimi_social_list('footer'); ?></div>
                </div>
                <div class="tm_pb_text tm_pb_module tm_pb_bg_layout_light tm_pb_text_align_left  tm_pb_text_0">
                    <div class="footer-address-right">
                        <h3 class="service-title-lager-footer">Dal Vostro Hotel</h3>
                        <div class="add-label-left">
                            <p><label>Address:</label></p>
                            <div>No. 12 Bao Khanh lane, Hoan Kiem dist, Ha Noi, Viet Nam</div>
                        </div>
                        <div class="add-label-left">
                            <p><label>Phone:</label></p>
                            <div>+84 243 932 0666</div>
                        </div>
                        <div class="add-label-left">
                            <p><label>Local Times:</label></p>
                            <div>12:22:22 pm</div>
                        </div>
                        <div class="add-label-left">
                            <p><label>Email:</label></p>
                            <div>Info@DalVostroHotel.com</div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div><!-- .site-info -->
</div><!-- .container -->
