<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 * Template Name: Template Home Blog
 */
global $data;
get_header(); ?>

<?php include (TEMPLATEPATH . '/framework/includes/bg.php'); ?>

<?php $social = get_post_meta($post->ID, 'siiimple_social_media', TRUE); ?>
<?php if(!empty($social) && $social == 'light') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar-light.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'dark') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'none') { ?>
<?php } ?>

<div class="page-content second-home" id="blog-content"> 

	<div class="container home2" id="page-bottom">
	
		<div class="grid16 col top-header">
	
			<?php if(!empty($data['home_tagline_blog'])) { ?>
	
			<h1 class="main-header-title"><?php echo $data['home_tagline_blog']; ?></h1>
		
			<?php } ?>
	
		</div>
	
	<?php if($data['home_slider'] == 'Featured Image Gallery') { ?>
  	    	
  		<div class="clear"></div>
	
		<div class="flexslider loading">
  	    
  	    	<ul class="slides">
  	    	
  	    	<?php 
						  		$args = array(
						  		'orderby' => 'menu_order',
						  		'post_type' => 'attachment',
						  		'post_parent'    => get_the_ID(),
						  		'post_mime_type' => 'image',
						  		'post_status'    => null,
						  		'numberposts'    => -1,
						  		);
						  		$attachments = get_posts($args);
						  	?>
						  	<?php 
				 
				$thumbblog = get_post_thumbnail_id();
				$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
				$imageblog = aq_resize( $img_url_blog, 960, 500, true );
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'index-blog' );
				$image = aq_resize( $img_url, 1680, 1050, true );
				?>
						  	<?php if ($attachments) : ?>
					 
	  	    				<?php foreach ($attachments as $attachment) : ?>
                        	
	  	    				<?php $attachment_url = wp_get_attachment_url($attachment->ID , 'full');  ?>
							<?php $image = aq_resize($attachment_url, 960,500, true); //resize & retain image proportions (soft crop) ?>

				
				<li><img src="<?php echo $image ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></li>
				
					<?php endforeach; ?>
                        	<?php endif; ?>
                        	
                        		</ul>
  	    	
  	    </div><!--FLEXSLIDER LOADING-->	
  	    	<div class="clear"></div>
                        	
                        <?php } else if ($data['home_slider'] == 'Portfolio') { ?>
                        
                        <div class="clear"></div>
	
		<div class="flexslider loading">
  	    
  	    	<ul class="slides">

  	    	
  	    	<?php 
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$wpbp = new WP_Query(array( 'post_type' => 'portfolio', 'posts_per_page' =>'-1', 'paged' => $paged ) ); 
				if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 
				$thumbblog = get_post_thumbnail_id();
				$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
				$imageblog = aq_resize( $img_url_blog, 960, 500, true );
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'index-blog' );
				$image = aq_resize( $img_url, 1680, 1050, true );
				?>
				
				<li><a href="<?php the_permalink(); ?>"><img src="<?php echo $imageblog ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a></li>
				
				
				<?php endwhile; endif; // END the Wordpress Loop ?>
				<?php wp_reset_query(); // Reset the Query Loop?>
					</ul>
  	    	
  	    </div><!--FLEXSLIDER LOADING-->	
  	    	
  	    <div class="clear"></div>
			
		<?php } else if ($data['home_slider'] == 'Gallery') { ?>	
			
		<div class="clear"></div>
	
		<div class="flexslider loading">
  	    
  	    	<ul class="slides">
			
			<?php 
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$wpbp = new WP_Query(array( 'post_type' => 'gallery', 'posts_per_page' =>'-1', 'paged' => $paged ) ); 
				if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 
				$thumbblog = get_post_thumbnail_id();
				$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
				$imageblog = aq_resize( $img_url_blog, 960, 500, true );
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'index-blog' );
				$image = aq_resize( $img_url, 1680, 1050, true );
				?>
				
				<li><a href="<?php the_permalink(); ?>"><img src="<?php echo $imageblog ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a></li>
				
				<?php $count++; // Increase the count by 1 ?>		
				<?php endwhile; endif; // END the Wordpress Loop ?>
				<?php wp_reset_query(); // Reset the Query Loop?>
				
				</ul>
  	    	
</div><!--FLEXSLIDER LOADING-->
<div class="clear"></div>
<?php } else if($data['home_slider'] == 'None') { ?>	
<?php } ?>
  	    	
<?php 
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'index-blog' );
$image = aq_resize( $img_url, 1600, 350, true );
$enable_single = get_post_meta($post->ID, 'siiimple_single_meta', TRUE);
$social_media = get_post_meta($post->ID, 'siiimple_social_media', TRUE);
?>
		
<?php if(!empty($enable_single) && $enable_single == 'right-sidebar') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/home/home-blog-right-sidebar.php'); ?>

<?php } ?>

<?php if(!empty($enable_single) && $enable_single == 'left-sidebar') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/home/home-blog-left-sidebar.php'); ?>

<?php } ?>

<?php if(!empty($enable_single) && $enable_single == 'left-right-sidebar') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/home/home-blog-left-right-sidebar.php'); ?>

<?php } ?>

<?php if(!empty($enable_single) && $enable_single == 'full-width') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/home/home-blog-full-width.php'); ?>

<?php } ?>

<?php include (TEMPLATEPATH . '/pre-footer.php'); ?>

<?php get_footer(); ?>