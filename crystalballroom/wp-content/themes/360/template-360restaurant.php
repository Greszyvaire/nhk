<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 * Template Name: 360 Restaurant
 */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Panorama 360&deg; - Crystal Ballroom New Hongkong II</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">html,body,div,span,h1,h2,h3,h4,h5,h6,p,img{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent;}html{overflow:auto;}body{line-height:1;}a{margin:0;padding:0;font-size:100%;vertical-align:baseline;background:transparent;}html,body{width:100%;height:100%;}body{background-color:#999;}</style>
	<link rel="stylesheet" href="http://crystalballroom.new-hongkongrestaurant.com/css/panorama360.css" media="all" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://crystalballroom.new-hongkongrestaurant.com/js/jquery.mousewheel.min.js"></script>
	<script src="http://crystalballroom.new-hongkongrestaurant.com/js/jquery.panorama360.js"></script>
	<script>
		$(function(){
			$('.panorama-view').panorama360({
				sliding_controls: true
			});
		});
	</script>
</head>
<body>
	<div class="panorama">
		<div class="preloader"></div>
		<div class="panorama-view">
			<div class="panorama-container">
			<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
				<img src="<?php echo $url; ?>" data-width="5000" data-height="551" alt="Panorama Alt" />
			</div>
		</div>
		<a class="info" href="http://crystalballroom.new-hongkongrestaurant.com/">Kembali ke beranda</a>
	</div>
</body>
</html>