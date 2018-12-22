<?php
/**
 * Template part for centered Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sanohimi
 */
?>

<div class="header-container__flex">
    <div class="upgrading-web">We are upgrading our system, please call to reception by <span style="font-weight: bold;">+84 243 932 0666</span> or Email <span style="font-weight: bold;">Info@DalVostroHotel.com</span></div>
    <div class="site-branding">
            <?php sanohimi_header_logo() ?>
            <?php sanohimi_site_description(); ?>
    </div>
    <div class="top-account">
        
        <?php get_template_part( 'template-parts/header/top-panel' ); ?>
    </div>
    <?php sanohimi_main_menu(); ?>
    
    <?php sanohimi_top_header_right( '%s' ); ?>
</div>
