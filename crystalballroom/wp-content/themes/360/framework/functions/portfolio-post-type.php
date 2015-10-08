<?php

// function: portfolio_filter BEGIN
function portfolio_filter()
{
	// Register the Taxonomy
	register_taxonomy(__( "filter",'siiimple' ), 
	
	// Assign the taxonomy to be part of the portfolio post type
	array(__( "portfolio" ,'siiimple')), 
	
	// Apply the settings for the taxonomy
	array(
		"hierarchical" => true, 
		"label" => __( "Filter",'siiimple' ), 
		"singular_label" => __( "Filter",'siiimple' ), 
		"rewrite" => array(
				'slug' => 'filter', 
				'hierarchical' => true
				)
		)
	); 
} // function: portfolio_filter END

add_action( 'init', 'portfolio_filter', 0 );

?>