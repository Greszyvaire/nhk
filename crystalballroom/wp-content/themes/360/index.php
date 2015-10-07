<!DOCTYPE html>
<?php global $data; ?>
<html <?php language_attributes(); ?>>

<head>

<!-- CHARSET -->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!-- TITLE -->
<title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>

<!-- VIEWPORT -->
<?php if($data['disable_responsive'] !='disable') { ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } ?>

<!-- DESCRIPTION -->
<meta name="description" content="<?php if(!empty($data['meta-desc'])) { ?><?php echo $data['meta-desc']; ?><?php } ?>" />

<!-- KEYWORDS -->
<meta name="keywords" content="<?php if(!empty($data['meta-key'])) { ?><?php echo $data['meta-key']; ?><?php } ?>" />

<!-- FAVICON -->
<?php if(!empty($data['custom_favicon'])) { ?><link rel="icon" type="image/png" href="<?php echo $data['custom_favicon']; ?>" /><?php } ?>

<!-- FACEBOOK COMMENTS -->
<meta property='fb:app_id' content='<?php if(!empty($data['comments_facebook'])) { ?><?php echo $data['comments_facebook']; ?><?php } ?>' />

<!-- STYLESHEET -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<!-- PINGBACK -->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/framework/css/ie.css" />
<![endif]-->

<!-- APPLE TOUCH ICONS -->
<?php if(!empty($data['custom_apple_touch_icon_1'])) { ?><link rel="apple-touch-icon" href="<?php echo $data['custom_apple_touch_icon_1']; ?>"><?php } ?>
<?php if(!empty($data['custom_apple_touch_icon_2'])) { ?><link rel="apple-touch-icon" sizes="72x72" href="<?php echo $data['custom_apple_touch_icon_2']; ?>"><?php } ?>
<?php if(!empty($data['custom_apple_touch_icon_3'])) { ?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo $data['custom_apple_touch_icon_3']; ?>"><?php } ?>

<!-- TRACKING HEADER -->
<?php echo stripslashes($data['tracking_header']); ?>

<!-- WP HEAD -->
<?php wp_head(); ?>

<!-- END HEAD -->
</head>

<div id="index-home">

	<div class="welcome">
	
	<?php if(!empty($data['welcome'])) { ?>
	
		<?php echo $data['welcome']; ?>
	
 	<?php } ?>
	
	</div>

</div>

<?php wp_footer(); ?>
		
</body>

</html>