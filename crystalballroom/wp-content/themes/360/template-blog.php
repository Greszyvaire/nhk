<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 * Template Name: Template Blog
 */
global $data;
get_header();
?>

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

<?php 
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'index-blog' );
$image = aq_resize( $img_url, 1600, 350, true );
$enable_single = get_post_meta($post->ID, 'siiimple_single_meta', TRUE);
$social_media = get_post_meta($post->ID, 'siiimple_social_media', TRUE);
?>

<?php if(!empty($enable_single) && $enable_single == 'right-sidebar') { ?>

	<?php include( trailingslashit( get_template_directory() ). '/framework/includes/blog-right-sidebar.php' ); ?>

<?php } ?>

<?php if(!empty($enable_single) && $enable_single == 'left-sidebar') { ?>

	<?php include (trailingslashit( get_template_directory() ) . '/framework/includes/blog-left-sidebar.php'); ?>

<?php } ?>

<?php if(!empty($enable_single) && $enable_single == 'left-right-sidebar') { ?>

	<?php include (trailingslashit( get_template_directory() ) . '/framework/includes/blog-left-right-sidebar.php'); ?>

<?php } ?>

<?php if(!empty($enable_single) && $enable_single == 'full-width') { ?>

	<?php include (trailingslashit( get_template_directory() ) . '/framework/includes/blog-full-width.php'); ?>

<?php } ?>

<?php include (trailingslashit( get_template_directory() ) . '/pre-footer.php'); ?>

<?php get_footer(); ?>