<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 */
global $data;
get_header();
?>

<?php if($data['error_bg'] !='') { ?>
	
	<div class="line"></div>
	
	<div id="bg-bg">
		<img src="<?php echo $data['error_bg']; ?>" alt="<?php bloginfo( 'name' ) ?>" />
	</div>

<?php } else { ?> 

	<div class="line"></div>

	<div id="bg-bg">
		<img src="<?php echo get_template_directory_uri(); ?>/framework/images/no-image.png">
	</div>

<?php } ?>

<div class="page-content error">

	<div class="container" id="page-bottom">
	
		<div class="grid10 col full-width" id="content-wrapper">

			<?php if(!empty($data['404_header'])) { ?>
			
			<h3><?php echo $data['404_header']; ?></h3>
		
			<?php } ?>

			<?php if(!empty($data['404_text'])) { ?>
			
			<p><?php echo $data['404_text']; ?></p>
		
			<?php } ?>
		
		</div>
		
	</div>
	
</div>

<?php include (TEMPLATEPATH . '/pre-footer.php'); ?>
	
<?php get_footer(); ?>