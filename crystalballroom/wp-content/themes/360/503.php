<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 * Template Name: Template 503
 */
global $data;
?>

<!DOCTYPE html>
<?php global $data ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="<?php if(!empty($data['meta-desc'])) { ?><?php echo $data['meta-desc']; ?><?php } ?>" />
<meta name="keywords" content="<?php if(!empty($data['meta-key'])) { ?><?php echo $data['meta-key']; ?><?php } ?>" />
<?php if(!empty($data['custom_favicon'])) { ?><link rel="icon" type="image/png" href="<?php echo $data['custom_favicon']; ?>" /><?php } ?>
<meta property='fb:app_id' content='<?php if(!empty($data['comments_facebook'])) { ?><?php echo $data['comments_facebook']; ?><?php } ?>' />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if(!empty($data['custom_apple_touch_icon_1'])) { ?><link rel="apple-touch-icon" href="<?php echo $data['custom_apple_touch_icon_1']; ?>"><?php } ?>
<?php if(!empty($data['custom_apple_touch_icon_2'])) { ?><link rel="apple-touch-icon" sizes="72x72" href="<?php echo $data['custom_apple_touch_icon_2']; ?>"><?php } ?>
<?php if(!empty($data['custom_apple_touch_icon_3'])) { ?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo $data['custom_apple_touch_icon_3']; ?>"><?php } ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
	
<body <?php body_class(); ?> id="cdt">

<?php include (TEMPLATEPATH . '/framework/includes/bg.php'); ?>

<div class="container" id="countdown">

		<?php if(!empty($data['503_header'])) { ?>
			
			<h2><?php echo $data['503_header']; ?></h2>
		
		<?php } ?>

		<?php if(!empty($data['503_text'])) { ?>
			
			<p><?php echo $data['503_text']; ?></p>
		
		<?php } ?>

<div id="countdown">
	<p id="time"></p>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery.noConflict();
	var myTime = new Date(<?php if(!empty($data['503_year'])) { ?><?php echo $data['503_year']; ?><?php } ?>, <?php if(!empty($data['503_month'])) { ?><?php echo $data['503_month']; ?><?php } ?>-1, <?php if(!empty($data['503_day'])) { ?><?php echo $data['503_day']; ?><?php } ?>);
	jQuery('#time').countdown({
		format: 'odHMS',
		until: myTime
	});
});
</script>
