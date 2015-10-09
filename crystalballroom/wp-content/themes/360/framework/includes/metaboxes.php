<?php

function portfolio_img_metabox() {
	
	global $post;
	
	$img1 = get_post_meta( $post->ID, 'portfolio-image-1', true );
	$img2 = get_post_meta( $post->ID, 'portfolio-image-2', true );
	$img3 = get_post_meta( $post->ID, 'portfolio-image-3', true );
	$img4 = get_post_meta( $post->ID, 'portfolio-image-4', true );
	$img5 = get_post_meta( $post->ID, 'portfolio-image-5', true );
	
	?>
	
	<input type="hidden" name="portfolio_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>" />
    
    <table class="form-table meta-box">
    	
		<tr>
			<th><label for="portfolio-image-1">Image 1</label></th>
			<td>
				<input id="portfolio-image-1" class="upload" type="text" name="portfolio-image-1" value="<?php echo $img1; ?>" />
				<input id="portfolio-image-1-uploader" class="upload_button button" type="button" value="Browse" />
			</td>
		</tr>
		
		<tr>
			<th><label for="portfolio-image-2">Image 2:</label></th>
			<td>
				<input id="portfolio-image-2" class="upload" type="text" name="portfolio-image-2" value="<?php echo $img2; ?>" />
				<input id="portfolio-image-2-uploader" class="upload_button button" type="button" value="Browse" />
			</td>
		</tr>
		
		<tr>
			<th><label for="portfolio-image-3">Image 3:</label></th>
			<td>
				<input id="portfolio-image-3" class="upload" type="text" name="portfolio-image-3" value="<?php echo $img3; ?>" />
				<input id="portfolio-image-3-uploader" class="upload_button button" type="button" value="Browse" />
			</td>
		</tr>
		
		<tr>
			<th><label for="portfolio-image-4">Image 4:</label></th>
			<td>
				<input id="portfolio-image-4" class="upload" type="text" name="portfolio-image-4" value="<?php echo $img4; ?>" />
				<input id="portfolio-image-4-uploader" class="upload_button button" type="button" value="Browse" />
			</td>
		</tr>
		
		<tr>
			<th><label for="portfolio-image-5">Image 5:</label></th>
			<td>
				<input id="portfolio-image-5" class="upload" type="text" name="portfolio-image-5" value="<?php echo $img5; ?>" />
				<input id="portfolio-image-5-uploader" class="upload_button button" type="button" value="Browse" />
			</td>
		</tr>
		
	</table>
	
<?php
}

function save_portfolio_img_metabox( $post_id ) {
	global $post;
	
	if ( !isset($_POST['portfolio_meta_box_nonce']) || !wp_verify_nonce( $_POST['portfolio_meta_box_nonce'], basename(__FILE__) ) ) {
        return $post_id;
    }
	
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	
	if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
	
	if( $post->post_type == "portfolio" ) {
    	if ( isset( $_POST['portfolio-image-1']) ) { update_post_meta( $post->ID, 'portfolio-image-1', stripslashes( htmlspecialchars( esc_url( $_POST['portfolio-image-1'] ) ) ) ); }
        if ( isset( $_POST['portfolio-image-2']) ) { update_post_meta( $post->ID, 'portfolio-image-2', stripslashes( htmlspecialchars( esc_url( $_POST['portfolio-image-2'] ) ) ) ); }
		if ( isset( $_POST['portfolio-image-3']) ) { update_post_meta( $post->ID, 'portfolio-image-3', stripslashes( htmlspecialchars( esc_url( $_POST['portfolio-image-3'] ) ) ) ); }
        if ( isset( $_POST['portfolio-image-4']) ) { update_post_meta( $post->ID, 'portfolio-image-4', stripslashes( htmlspecialchars( esc_url( $_POST['portfolio-image-4'] ) ) ) ); }
        if ( isset( $_POST['portfolio-image-5']) ) { update_post_meta( $post->ID, 'portfolio-image-5', stripslashes( htmlspecialchars( esc_url( $_POST['portfolio-image-5'] ) ) ) ); }
	}	
}

add_action( 'admin_init', 'add_portfolio_img_meta_box' );
add_action( 'save_post', 'save_portfolio_img_metabox' );


function add_portfolio_img_meta_box() {
	add_meta_box( 'portfolio-img-metabox', "Images (For Ajax Portfolio Only)", 'portfolio_img_metabox', 'portfolio', 'normal', 'high' );
}
 
function meta_boxes_scripts() {
	
	global $pagenow, $typenow, $current_screen;
  	
  	if ( empty( $typenow ) && !empty( $_GET['post'] ) ) {
    	$post = get_post( $_GET['post'] );
    	$typenow = $post -> post_type;
  	}
  
   if ( $current_screen -> post_type == 'portfolio' ) {
		if ( $pagenow=='post-new.php' OR $pagenow=='post.php' ) {	
			wp_enqueue_script( 'media-upload' );
			wp_enqueue_script( 'thickbox' );
			wp_register_script( 'metabox-upload', get_template_directory_uri() . '/admin/js/metabox.js', array ( 'jquery', 'media-upload', 'thickbox' ) );
		    wp_enqueue_script( 'metabox-upload' );
			wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', false, '2.0.8' );
    		wp_enqueue_script( 'modernizr' );
		}
    } 
}

function meta_boxes_styles() {
	
	global $pagenow, $typenow, $current_screen;
  	
  	if ( empty( $typenow ) && !empty( $_GET['post'] ) ) {	
    	$post = get_post( $_GET['post'] );
    	$typenow = $post -> post_type;
	}
  
	if( $current_screen -> post_type == 'portfolio' ) {
		if ( $pagenow=='post-new.php' OR $pagenow=='post.php' ) {	
			wp_enqueue_style( 'thickbox' );
			wp_enqueue_style( 'metabox-upload', get_template_directory_uri() . '/admin/css/metabox.css' );
		}
    } 
	
}

add_action( 'admin_print_scripts', 'meta_boxes_scripts' );
add_action( 'admin_print_styles', 'meta_boxes_styles' );

?>