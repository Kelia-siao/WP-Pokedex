<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to Pro in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );



// Additional Functions
// =============================================================================

add_action( 'pre_get_posts', 'custom_reverse_post_order' );
function custom_reverse_post_order( $query ) {
    if ( is_admin() )
        return;

    if ( $query->is_main_query() ) {
        $query->set( 'order', 'ASC' );
    }
}

function shapeSpace_filter_search($query) {
	if (!$query->is_admin && $query->is_search) {
		$query->set('post_type', array('pokemon'));
	}
	return $query;
}
add_filter('pre_get_posts', 'shapeSpace_filter_search');