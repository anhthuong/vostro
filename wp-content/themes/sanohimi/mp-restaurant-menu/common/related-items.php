<?php
$related_items = mprm_get_related_items();
if (!empty($related_items)) {
	?>
	<div class="mprm-related-items">
		<h4 class="mprm-title"><?php esc_html__('You might also like', 'mp-restaurant-menu'); ?></h4>
		<ul class="mprm-related-items-list">
			<?php foreach ($related_items as $related_item): ?>
				<li class="mprm-related-item">
						<div class="caption">
							<?php if (has_post_thumbnail($related_item)):
								echo get_the_post_thumbnail($related_item, apply_filters('mprm-related-item-image-size', 'mprm-middle'));
							endif; ?>
						</div>
						<p class="mprm-related-title"><a href="<?php echo get_permalink($related_item) ?>" title="<?php echo get_the_title($related_item) ?>"> <?php echo get_the_title($related_item) ?></p>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php
}
