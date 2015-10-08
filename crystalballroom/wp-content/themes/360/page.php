<?php
/**
 * @package WordPress
 * @subpackage Siiimple
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

<?php 
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'index-blog' );
$image = aq_resize( $img_url, 1600, 350, true );
$enable_single = get_post_meta($post->ID, 'siiimple_single_meta', TRUE);
?>

<?php if(!empty($enable_single) && $enable_single == 'right-sidebar') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/right-sidebar.php'); ?>

<?php } ?>

<?php if(!empty($enable_single) && $enable_single == 'left-sidebar') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/left-sidebar.php'); ?>

<?php } ?>

<?php if(!empty($enable_single) && $enable_single == 'left-right-sidebar') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/left-right-sidebar.php'); ?>

<?php } ?>

<?php if(!empty($enable_single) && $enable_single == 'full-width') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/full-width.php'); ?>

<?php } ?>

<?php include (TEMPLATEPATH . '/pre-footer.php'); ?>

<?php get_footer(); ?>