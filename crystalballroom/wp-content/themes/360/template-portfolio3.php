<?php
/*
Template Name: Template Portfolio Three Columns (AJAX)
*/
global $data;
?>

<?php get_header(); ?>

<?php $social = get_post_meta($post->ID, 'siiimple_social_media', TRUE); ?>
<?php if(!empty($social) && $social == 'light') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar-light.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'dark') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'none') { ?>
<?php } ?>

<?php include (TEMPLATEPATH . '/framework/includes/bg.php'); ?>

<div id="portfolio1" class="container">

	<div class="grid16 col top-header">
	
		<h1 class="main-header-title"><?php the_title(); ?></h1>
		
		<?php if(!empty($data['tagline_portfolio'])) { ?>
		<p class="sub-port"><?php echo $data['tagline_portfolio']; ?></p>
		<?php } ?>
	
	</div>

	<?php $my_query = new WP_Query( array( 'posts_per_page' => '-1', 'post_type' => 'portfolio' ) ); ?>
    
    <!-- AJAX container -->
    
	<div id="detail"></div>
    
    <div id="folio" class="three-columns">
    	
    	<ul>
        	
        	<?php		
			query_posts(array(
                'post_type'=>'portfolio',
				'posts_per_page' => $data['portfolio_num'],
                'paged'=>$paged
            ));
            ?>
        
            <?php
			$count=0;
            while (have_posts()) : the_post();
			$count++;
			
           	$thumbblog = get_post_thumbnail_id();
			$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
			$port_excerpt = get_post_meta($post->ID, 'siiimple_port_excerpt', TRUE);
			$video = get_post_meta($post->ID, 'siiimple_video', TRUE);
			$imageblog = aq_resize( $img_url_blog, 320, 230, true );
            ?>
			
			<?php if ($video) { ?>
			
			<li class="folio-item video">
			
				<iframe src="<?php echo $video; ?>" width="320" height="230" frameborder="0" class="vid"></iframe>
			
				<div class="port-info">
                    
                	<h5><?php the_title(); ?></h5>
                  	<p><?php echo $port_excerpt; ?></p>
                
                </div>
			
			</li>
			
			<?php } else { ?>
			
			<li class="folio-item">
        
        		<?php $nonce = wp_create_nonce("portfolio_item_nonce"); ?>
                   
            	<a class="detail-link" href="<?php the_permalink(); ?>" data-id="<?php echo $post->ID; ?>" data-nonce="<?php echo $nonce; ?>">
                   
              	  <span class="rollover"></span>
                    	
                  <img src="<?php echo $imageblog ?>">	
                    	
            	</a>
            	
            	<div class="port-info">
                    
                	<h5><?php the_title(); ?></h5>
                  	<p><?php echo $port_excerpt; ?></p>
                
                </div>
             	
             </li>
            	
            <?php } ?>                   
          
        	<?php endwhile; ?>
        </ul>
    
    </div>
    
    <div class="clear"></div>
	
	<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>

</div>

<?php include (TEMPLATEPATH . '/pre-footer.php'); ?>
    
<?php get_footer(); ?>