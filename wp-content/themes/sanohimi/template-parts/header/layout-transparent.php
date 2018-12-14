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
    
    <div class="site-branding">
            <?php sanohimi_header_logo() ?>
            <?php sanohimi_site_description(); ?>
    </div>
    <div class="top-account">
        <div class="upgrading-web">We're sorry, but we are upgrading our system, please call to reception by +84 243 932 0666</div>
        <?php get_template_part( 'template-parts/header/top-panel' ); ?>
    </div>
    <?php sanohimi_main_menu(); ?>
    
    <?php sanohimi_top_header_right( '%s' ); ?>
</div>
