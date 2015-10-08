<?php 

add_action( "wp_ajax_load_portfolio_item", "load_portfolio_item" );
add_action( "wp_ajax_nopriv_load_portfolio_item", "load_portfolio_item" );

function load_portfolio_item() {

    if ( !wp_verify_nonce( $_REQUEST['nonce'], "portfolio_item_nonce" ) ) { exit(); }     
	
	$current_id = $_REQUEST['post_id'];
	$portfolio_images = get_portfolio_images( $_REQUEST['post_id'] );
	$content_post = get_post( $_REQUEST['post_id'] );
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);
	$post = get_post( $current_id ); 
	$final_width = 680;
	$final_height = 500;
	ob_start();
	
?>

	<!-- images holder -->

	<div id="detail-item">
			
			<?php if( count( $portfolio_images ) === 1 ) { $portfolio_img_url = $portfolio_images[0]; 
				$image_meta = wp_get_attachment_image_src( get_id_from_src( $portfolio_img_url ), 'full');
				$image_width = $image_meta[1];
				$image_height = $image_meta[2];
				$final_height = floor( $image_height * ( $final_width / $image_width ) ); ?>
				
                <!-- single portfolio image -->
                
                <div class="single-port-img">
                					       		  	
				<img width="<?php echo $final_width; ?>" height="<?php echo $final_height; ?>" src="<?php echo $portfolio_img_url; ?>" alt="<?php the_title(); ?>" />
				
				</div>
                
                <!-- end single portfolio image -->
					              
			<?php } else if ( count( $portfolio_images ) >= 1 ) { ?>
				
				<!-- slider - multiple images -->
                
                <div id="slider">
					<div id="slides">
						<div class="slides-container">
				
							<?php foreach ( $portfolio_images as $portfolio_img_url ) { ?>
										
							    <div class="slide">
									    
                                    <?php  $image_meta = wp_get_attachment_image_src( get_id_from_src( $portfolio_img_url ), 'full'); 
									$image_width = $image_meta[1]; 
									$image_height = $image_meta[2]; 
									$final_height = floor( $image_height * ( $final_width / $image_width ) ); ?>    
                                        	
								   <img width="<?php echo $final_width; ?>" height="<?php echo $final_height; ?>" src="<?php echo $portfolio_img_url; ?>" />
										              
								</div>
																      
							<?php } ?>
							        							    
						</div> 
					</div>
			
                
                <!-- end slider - multiple images -->
		
			<?php } ?>
		
	</div>
	
	</div>
    
    <!-- end images holder -->
    
    <!-- content holder -->
    
 	<div id="detail-meta">
		
		<?php $prev_nonce = wp_create_nonce("portfolio_item_nonce"); $next_nonce = wp_create_nonce("portfolio_item_nonce"); ?>
		
		<!-- navigation -->
        
        <div id="folio-ctrl">
			<div class="close">Close</div>
            
            <?php if ( $_REQUEST['prev_post_id'] && $_REQUEST['next_post_id'] ) { ?>			
            
                <div>
                	<a class="prev-item" href="#" data-id="<?php echo $_REQUEST['prev_post_id']; ?>" data-nonce="<?php echo $prev_nonce; ?>">
                    	
                     </a>
                </div>
                <div>
                	<a class="next-item" href="#" data-id="<?php echo $_REQUEST['next_post_id']; ?>" data-nonce="<?php echo $next_nonce; ?>">
                    	
                     </a>
                </div>
                
            <?php } else if ( $_REQUEST['prev_post_id'] ) { ?>
            
                <div>
                	<a class="prev-item" href="#" data-id="<?php echo $_REQUEST['prev_post_id']; ?>" data-nonce="<?php echo $prev_nonce; ?>">
                    	
                    </a>
                </div>
    
            <?php } else if ( $_REQUEST['next_post_id'] ) { ?>
    
                <div>
                	<a class="next-item" href="#" data-id="<?php echo $_REQUEST['next_post_id']; ?>" data-nonce="<?php echo $next_nonce; ?>">
                    	
                    </a>
                </div>
        
            <?php } ?>
			
        <!-- end navigation -->
        	
		<h2><?php echo get_the_title( $current_id ); ?></h2>
        
        <?php if ( $content ) { ?>
		
        	<!-- description -->
        
			<div class="item-description">  			
				<?php echo $content; ?>
			</div>
            
            <!-- end description -->
		
		<?php } ?>
					
	</div>
	
	</div>
    
    <!-- end content holder -->

<?php

 	$result['html'] = ob_get_clean();

   	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
      	$result = json_encode($result);
      	echo $result;
   	}
   	else {
      	header("Location: ".$_SERVER["HTTP_REFERER"]);
   	}

   	die();

}

function get_id_from_src( $image_src ) {
	
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	return $id;
	
}

function get_portfolio_images( $post_id ) {
		
	$img0 = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
	$img1 = get_post_meta( $post_id, 'portfolio-image-1', true );
	$img2 = get_post_meta( $post_id, 'portfolio-image-2', true );
	$img3 = get_post_meta( $post_id, 'portfolio-image-3', true );
	$img4 = get_post_meta( $post_id, 'portfolio-image-4', true );
	$img5 = get_post_meta( $post_id, 'portfolio-image-5', true );
	
	$meta_fields = array( $img0, $img1, $img2, $img3, $img4, $img5 );
	$image_urls = array();
	
	foreach($meta_fields as $meta_field) {
		if( $meta_field ) {
			$image_urls[] = $meta_field;
		}
	}
	
	return $image_urls;
	
}

?>