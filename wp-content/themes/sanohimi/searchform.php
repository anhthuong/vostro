<?php
/**
 * The template for displaying search form.
 *
 * @package Sanohimi
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'sanohimi' ) ?></span>
		<input type="search" class="search-form__field"
			placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'sanohimi' ) ?>"
			value="<?php echo get_search_query() ?>" name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label', 'sanohimi' ) ?>" />
	</label>
	<button type="submit" class="search-form__submit"><i class="fa fa-search"></i></button>
</form>
