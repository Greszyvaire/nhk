<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 */
get_header();
global $data;
?>

<?php if($data['archives_bg'] !='') { ?>
	
	<div class="line"></div>
	
	<div id="bg-bg">
		<img src="<?php echo $data['archives_bg']; ?>" alt="<?php bloginfo( 'name' ) ?>" />
	</div>

<?php } else { ?> 

	<div class="line"></div>

	<div id="bg-bg">
		<img src="<?php echo get_template_directory_uri(); ?>/framework/images/no-image.png">
	</div>

<?php } ?>

<?php if (have_posts()) : ?>
	
<div class="page-content" id="blog-content">

	<div class="container" id="page-bottom">
	
	<div class="grid16 col top-header">

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h1 class="main-title"><?php _e('Archive for the','siiimple') ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category','siiimple') ?></h1>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h1 class="main-title"><?php _e('Posts tagged','siiimple') ?> &#8216;<?php single_tag_title(); ?>&#8217;</h1>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h1 class="main-title"><?php _e('Archive for','siiimple') ?> <?php the_time('F jS, Y'); ?></h1>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h1 class="main-title"><?php _e('Archive for','siiimple') ?> <?php the_time('F, Y'); ?></h1>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h1 class="main-title"><?php _e('Archive for','siiimple') ?> <?php the_time('Y'); ?></h1>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h1 class="main-title"><?php _e('Author Archive','siiimple') ?></h1>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h1 class="main-title"><?php _e('Blog Archives','siiimple') ?></h1>
	<?php /* If this is a yearly archive */ } elseif (has_post_format('image')) { ?>
	<h1 class="main-title"><?php _e('Images','siiimple') ?></h1>
	<?php /* If this is a yearly archive */ } elseif (has_post_format('gallery')) { ?>
	<h1 class="main-title"><?php _e('Galleries','siiimple') ?></h1>
	<?php /* If this is a yearly archive */ } elseif (has_post_format('aside')) { ?>
	<h1 class="main-title"><?php _e('Asides','siiimple') ?></h1>
	<?php /* If this is a yearly archive */ } elseif (has_post_format('audio')) { ?>
	<h1 class="main-title"><?php _e('Audios','siiimple') ?></h1>
	<?php /* If this is a yearly archive */ } elseif (has_post_format('link')) { ?>
	<h1 class="main-title"><?php _e('Links','siiimple') ?></h1>
	<?php /* If this is a yearly archive */ } elseif (has_post_format('quote')) { ?>
	<h1 class="main-title"><?php _e('Quotes','siiimple') ?></h1>
	<?php /* If this is a yearly archive */ } elseif (has_post_format('video')) { ?>
	<h1 class="main-title"><?php _e('Videos','siiimple') ?></h1>
	<?php } ?>
	
	</div>
	
	<div class="blog-content-wrap">
	
		<div class="grid10 col full-width" id="content-wrapper">

		<?php while (have_posts()) : the_post(); ?>
			
		<?php if ( has_post_format( 'gallery' )) { ?>
        			
        <div class="post" id="post-<?php the_ID(); ?>">
        		
		<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-gallery">&nbsp;</span></h5>
	
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
	  	    	
	  	   		<?php if ($attachments) : ?>
					 
	  	    	<?php foreach ($attachments as $attachment) : ?>
                        	
	  	    	<?php $attachment_url = wp_get_attachment_url($attachment->ID , 'full');  ?>
				<?php $image = aq_resize($attachment_url, 960,400, true); //resize & retain image proportions (soft crop) ?>
				
				<li><img src="<?php echo $image ?>"/></li>
					
		  	    <?php endforeach; ?>
                        
		  	    <?php endif; ?>
		  	    
		  	</ul>
  	    	
  	    </div><!--FLEXSLIDER LOADING-->
  	    
  	    <?php include (TEMPLATEPATH . '/framework/includes/metadata.php'); ?>
</div><!-- END POST -->
        			
<?php } ?>
        			
<?php if ( has_post_format( 'audio' )) { ?>
        			
<?php siiimple_audio(get_the_ID()); ?>

<?php 
$thumbblog = get_post_thumbnail_id();
$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
$imageblog = aq_resize( $img_url_blog, 960, 400, true );
?>

<div class="post" id="post-<?php the_ID(); ?>">
        		
	<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-audio">&nbsp;</span></h5>
	
	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
    
    	<div class="image-wrap">
    
    		<img src="<?php echo $imageblog ?>" class="page-img" style="margin-bottom:0"/>		
       
    	</div>					
      
    <?php endif; ?>
	
		<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer"></div>
		
                    <div class="jp-audio-container">
                        <div class="jp-audio">
                            <div class="jp-type-single">
                                <div id="jp_interface_<?php the_ID(); ?>" class="jp-interface">
                                    <ul class="jp-controls">
                                    	<li><div class="seperator-first"></div></li>
                                        <li><div class="seperator-second"></div></li>
                                        <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                                        <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                                        <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                                        <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                                    </ul>
                                    <div class="jp-progress-container">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div class="jp-play-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jp-volume-bar-container">
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
        <div class="clear"></div>
        
        <?php include (TEMPLATEPATH . '/framework/includes/metadata.php'); ?>
</div><!-- END POST -->
        			
        			<?php } ?>
        			
        			<?php if ( has_post_format( 'image' )) { ?>
        			
        			<?php 
$thumbblog = get_post_thumbnail_id();
$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
$imageblog = aq_resize( $img_url_blog, 960, 400, true );
?>

<div class="post" id="post-<?php the_ID(); ?>">
        		
	<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-image">&nbsp;</span></h5>
        		
    	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
    
    	<div class="image-wrap">
    
    		<img src="<?php echo $imageblog ?>" class="page-img"/>		
       
    	</div>					
      
    <?php endif; ?>
    
     <?php include (TEMPLATEPATH . '/framework/includes/metadata.php'); ?>
</div><!-- END POST -->
        			
        			<?php } ?>
        			
        			<?php if ( has_post_format( 'link' )) { ?>
        			
        			<div class="post link" id="post-<?php the_ID(); ?>">

	<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-link">&nbsp;</span></h5>

	<a href="#"><?php the_content(); ?></a>
	
		<p class="link-date"><?php _e('Posted','siiimple') ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'framework'); ?></p>
   
</div><!-- END POST -->
        			
        			<?php } ?>
        			
        			<?php if ( has_post_format( 'quote' )) { ?>
        			
        			<div class="post quote" id="post-<?php the_ID(); ?>">

	<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-quote-small">&nbsp;</span></h5>

	<?php the_content(); ?>
   
</div><!-- END POST -->
        			
        			<?php } ?>
        			
        			<?php if ( has_post_format( 'aside' )) { ?>
        			
        			<div class="post aside" id="post-<?php the_ID(); ?>">

<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-aside">&nbsp;</span></h5>
 

<?php include (TEMPLATEPATH . '/framework/includes/metadata.php'); ?>
</div><!-- END POST -->
        			
      <?php } ?>
      
      <?php if ( has_post_format( 'video' )) { ?>
      
      <?php 
$thumbblog = get_post_thumbnail_id();
$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
$imageblog = aq_resize( $img_url_blog, 570, 300, true );
?>

<div class="post" id="post-<?php the_ID(); ?>">
        		
	<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-video">&nbsp;</span></h5>
	
	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
    
    	<div class="image-wrap">
    
    		<img src="<?php echo $imageblog ?>" class="page-img" style="margin-bottom:0"/>		
       
    	</div>					
      
    <?php endif; ?>
	
		<?php $video = get_post_meta($post->ID, 'siiimple_video', TRUE); ?>
				
		<iframe src="<?php echo $video; ?>" width="570" height="321" frameborder="0" class="vid"></iframe>
                    
        <div class="clear" style="height:30px;"></div>
        
        <?php include (TEMPLATEPATH . '/framework/includes/metadata.php'); ?>
</div><!-- END POST -->
      
      <?php } ?>

		<?php endwhile; ?>

		   <div class="clear"></div>
	
			<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
		
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2>No posts found.</h2>");
		}
		get_search_form();

	endif;
?>

</div><!--END GRID 10-->  
			
		</div><!-- END BLOG CONTENT WRAP -->
		
	</div><!-- END CONTAINER -->
			
</div><!-- END PAGE CONTENT -->

<?php include (trailingslashit( get_template_directory() ) . '/pre-footer.php'); ?>

<?php get_footer(); ?>