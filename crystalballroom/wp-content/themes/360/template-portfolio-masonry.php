<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 * Template Name: Template Portfolio Masonry
 */
global $data;
get_header(); ?>

<?php include (TEMPLATEPATH . '/framework/includes/bg.php'); ?>

<div id="masonry-top" class="container">

	<div class="grid16 col top-header masonry">
	
		<h1 class="main-header-title"><?php the_title(); ?></h1>
		
		<?php if(!empty($data['tagline_portfolio'])) { ?>
		<p class="sub-port"><?php echo $data['tagline_portfolio']; ?></p>
		<?php } ?>
	
	</div>
	
</div>

<div id="container" class="transitions-enabled centered clearfix">

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
$imageblog = aq_resize( $img_url_blog, 320, true );
?>

<div class="box photo col3">

<?php if ($video) { ?>
	
	<iframe src="<?php echo $video; ?>" width="320" height="175" frameborder="0" class="vid" style="margin-bottom:0px"></iframe>
	
<?php } else { ?>

<a href="<?php the_permalink(); ?>">

	<span class="rollover"></span>
	
	<img src="<?php echo $imageblog ?>">
	
</a>
	
<?php } ?>
	
<div class="port-info">

	<?php if ( $port_excerpt ) { ?>
    
    	<h5><?php the_title(); ?></h5>
    
    	<p><?php echo $port_excerpt; ?></p>
          
  	<?php } else { ?>
          
        <h5 class="no-excerpt"><?php the_title(); ?></h5>
          
    <?php } ?>

</div><!-- END PORT INFO -->

</div><!-- END BOX -->

<?php endwhile; ?>

<div class="clear"></div>

<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>

</div><!-- END CONTAINER -->

<div class="clear" style="height:100px;"></div>

<?php include (TEMPLATEPATH . '/pre-footer.php'); ?>

<?php get_footer(); ?>