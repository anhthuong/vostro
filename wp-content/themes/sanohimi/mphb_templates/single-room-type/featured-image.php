<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php if (  has_post_thumbnail() ) : ?>

	<?php
		/**
		 * @hooked MPHBSingleRoomTypeView::_renderFeaturedImageParagraphOpen	- 10
		 */
		do_action('mphb_render_single_room_type_before_featured_image');
	?>



	<?php
		/**
		 * @hooked MPHBSingleRoomTypeView::_renderFeaturedImageParagraphClose	- 10
		 * @hooked MPHBSingleRoomTypeView::renderGallery						- 20
		 */
		do_action('mphb_render_single_room_type_after_featured_image');
	?>

<?php endif; ?>
