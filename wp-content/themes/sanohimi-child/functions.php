<?php
//include 'flexslider/flexslider.php';

//add_filter( 'single_template', function ( $single_template ) {
//
//    $parent     = '21'; //Change to your category ID
//    $categories = get_categories( 'child_of=' . $parent );
//    $cat_names  = wp_list_pluck( $categories, 'name' );
//
//    if ( has_category( 'movies' ) || has_category( $cat_names ) ) {
//        $single_template = dirname( __FILE__ ) . '/single-tour.php';
//    }
//    return $single_template;
//
//}, PHP_INT_MAX, 2 );

add_filter('single_template', 'check_for_category_single_template');
function check_for_category_single_template( $t )
{
  foreach( (array) get_the_category() as $cat ) 
  { 
    if ( file_exists(get_stylesheet_directory() . "/single-category-{$cat->slug}.php") ) return get_stylesheet_directory() . "/single-category-{$cat->slug}.php"; 
    if($cat->parent)
    {
      $cat = get_the_category_by_ID( $cat->parent );
      if ( file_exists(get_stylesheet_directory() . "/single-category-{$cat->slug}.php") ) return get_stylesheet_directory() . "/single-category-{$cat->slug}.php";
    }
  } 
  return $t;
}