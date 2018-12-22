<?php get_header( sanohimi_template_base() ); ?>

	<?php do_action( 'sanohimi_render_widget_area', 'full-width-header-area' ); ?>

	<div <?php echo sanohimi_get_container_classes( array( 'site-content_wrap' ), 'content' ); ?>>

		<?php do_action( 'sanohimi_render_widget_area', 'before-content-area' ); ?>

		<div class="row">

                    <div id="primary" <?php //sanohimi_primary_content_class(); ?> class="col-xs-12 col-md-12">

				<?php do_action( 'sanohimi_render_widget_area', 'before-loop-area' ); ?>

				<main id="main" class="site-main" role="main">

					<?php include sanohimi_template_path(); ?>

				</main><!-- #main -->

				<?php do_action( 'sanohimi_render_widget_area', 'after-loop-area' ); ?>

			</div><!-- #primary -->

			<?php //get_sidebar(); // Loads the sidebar.php template.  ?>

		</div><!-- .row -->

		<?php do_action( 'sanohimi_render_widget_area', 'after-content-area' ); ?>

	</div><!-- .container -->

	<?php do_action( 'sanohimi_render_widget_area', 'after-content-full-width-area' ); ?>

<?php get_footer( sanohimi_template_base() ); ?>
