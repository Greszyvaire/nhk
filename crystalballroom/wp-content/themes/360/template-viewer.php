<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 * Template Name: Template Image Viewer
 */
global $data;
get_header(); ?>

<?php include (TEMPLATEPATH . '/framework/includes/bg.php'); ?>

<div id="wrapper">
	<div id="carousel">
		<span class="empty"></span>
		<?php		
				query_posts(array(
                'post_type'=> $data['viewer-cpt'],
				'posts_per_page' => -1,
                'paged'=>$paged
            ));
            ?>
        
            <?php
			$count=0;
            while (have_posts()) : the_post();
			$count++;
			
           		$thumbblog = get_post_thumbnail_id();
				$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
				$imageblog = aq_resize( $img_url_blog, 900, 600, true );
				$thumbblogfull = get_post_thumbnail_id();
				$img_url_blogfull = wp_get_attachment_url( $thumbblogfull,'index-blog' );
				$imageblogfull = aq_resize( $img_url_blogfull, 1024, 680, true );
				$video = get_post_meta($post->ID, 'siiimple_video', TRUE);
            ?>
            
            

		<img src="<?php echo $imageblog ?>" alt="<?php the_title(); ?>" width="900" height="600" style="margin-top: 80px;" />

		<?php endwhile; ?>
		<span class="empty"></span> <!-- trick the carousel to end 1 item to the left -->
	</div>
</div>
<div id="bar">
	<a id="prev" href="#">&laquo;</a>
	<a id="next" href="#">&raquo;</a>
	<span id="title"></span>
</div>

<?php get_footer(); ?>

