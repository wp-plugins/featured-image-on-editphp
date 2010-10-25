<?php
/*
   Plugin Name: Featured Image on Edit.php
   Plugin URI: http://ounziw.com/2010/10/01/featured-image-on-edit-php/
   Description: Menu Simplify
   Author: Fumito MIZUNO
   Version: 1.1
   Author URI: http://ounziw.com/
 */
 
function show_featured_image_post_column( $defaults ) {
       $defaults['featuredimage'] = __('Featured Image') ;
    	return $defaults;
}
add_filter('manage_posts_columns', 'show_featured_image_post_column');

function edit_featured_images($column_name, $id) {
    if( $column_name == 'featuredimage' && has_post_thumbnail()) {
        the_post_thumbnail('thumbnail');
        echo "<div class=\"row-actions\"><span class='edit'>";
        echo '<a href="'. admin_url() . 'media-upload.php?post_id=163media.php?attachment_id=' . $id . '&type=image&TB_iframe=1">' . __( 'Edit' ) . '</a>';
        echo "</span></div>";
    }
}
add_action('manage_posts_custom_column', 'edit_featured_images', 10, 2);
