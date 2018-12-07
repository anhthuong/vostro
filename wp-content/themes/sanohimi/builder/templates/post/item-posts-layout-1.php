<?php
/**
 * Templat epart for displaying posts listing item
 */
?>
<div class="<?php echo tm_builder_tools()->get_col_classes( $this ); ?>">
	<div class="tm-posts_item">
	<?php
        //print_r(tm_builder_core()->utility()->attributes);die;
		tm_builder_core()->utility()->media->get_image( array(
			'html'        => '<a href="%1$s" %2$s><img src="%3$s" alt="%4$s"></a>',
			'class'       => 'tm-posts_img',
			'size'        => esc_attr( $this->_var( 'image_size' ) ),
			'echo'        => true,
		) );
                
                echo '<div class="cate-kmm">'. get_cat_name(1) .'</div>';
                
                tm_builder_core()->utility()->attributes->get_title( array(
			'visible'      => true,
			'trimmed_type' => 'word',
			'ending'       => '&hellip;',
			'html'         => '<h4 %1$s><a href="%2$s" %3$s rel="bookmark">%4$s</a></h4>',
			'class'        => 'tm-posts_item_title',
			'echo'         => true,
		) );

		echo $this->get_template_part( 'post/item-meta.php' );

		tm_builder_core()->utility()->attributes->get_content( array(
			'visible'      => ( $this->_var( 'excerpt' ) && 0 < $this->_var( 'excerpt' ) ) ? true : false,
			'content_type' => 'post_content',
			'length'       => $this->_var( 'excerpt' ),
			'trimmed_type' => 'word',
			'ending'       => '&hellip;',
			'html'         => '<div %1$s>%2$s</div>',
			'class'        => 'tm-posts_item_excerpt',
			'echo'         => true,
		) );

		tm_builder_core()->utility()->attributes->get_button( array(
			'visible'   => true,
			'text'      => esc_html__( 'Read More', 'sanohimi' ),
			'class'     => 'btn',
			'html'      => '<a href="%1$s" %2$s %3$s><span class="btn__text">%4$s</span>%5$s</a>',
			'echo'      => false, // thuongnv
		) );
	?>
	</div>
</div>
