<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 */
get_header();
?>

<?php $enable_single = get_post_meta($post->ID, 'siiimple_single_meta', TRUE); ?>
<?php $pagecolor = get_post_meta($post->ID, 'siiimple_single_post_color', TRUE); ?>
<?php $postbg = get_post_meta($post->ID, 'siiimple_post_bg', TRUE); ?>

<?php $social = get_post_meta($post->ID, 'siiimple_social_media', TRUE); ?>
<?php if(!empty($social) && $social == 'light') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar-light.php'); ?>
<?php } else if (!empty($social) && $social == 'dark') { ?> 
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar.php'); ?>
<?php } else if (!empty($social) && $social == 'none') { ?> 
<?php } ?>

<?php if ($postbg == "p0") { ?>
<div id="bg-bg">
<img src="<?php echo get_template_directory_uri(); ?>/framework/images/no-image.png">
</div>
<?php } elseif ($postbg == "p1") { ?>
<div class="line"></div>
<script type="text/javascript">
var wf_pbb_object = [
{bc:"rgb(0, 0, 0)"},
{img:"http://web-features.net/patterns/25.png", mm:true, ms:false, mms:5, mss:10, mmd:1, mso:"v", msd:1, im:"image", pr:"y", mma:"both", ofs:{x:0, y:0}, zi:1, sr:true, sb:false, isr:false, isb:false},
{img:"http://web-features.net/patterns/05.png", mm:true, ms:false, mms:1, mss:10, mmd:-1, mso:"v", msd:1, im:"pattern", pr:"both", mma:"both", ofs:{x:0, y:0}, zi:2, sr:false, sb:false, isr:false, isb:false}
];
</script>
<script type="text/javascript" src="http://web-features.net/api/wf.pbb.api.js"></script>
<?php } elseif ($postbg == "p2") { ?>
<div class="line"></div>
<script type="text/javascript">
var wf_pbb_object = [
{bc:"rgb(25, 25, 25)"},
{img:"<?php echo get_template_directory_uri(); ?>/framework/images/parallax/p1.png", mm:true, ms:false, mms:10, mss:10, mmd:1, mso:"v", msd:1, im:"image", pr:"y", mma:"both", ofs:{x:0, y:0}, zi:1, sr:true, sb:false, isr:false, isb:false},
{img:"<?php echo get_template_directory_uri(); ?>/framework/images/parallax/para.png", mm:true, ms:false, mms:3, mss:10, mmd:-1, mso:"v", msd:1, im:"pattern", pr:"both", mma:"both", ofs:{x:0, y:0}, zi:2, sr:false, sb:false, isr:false, isb:false}
];
</script>
<script type="text/javascript" src="http://web-features.net/api/wf.pbb.api.js"></script>
<?php } elseif ($postbg == "p3") { ?>
<div class="line"></div>
<div id="bg-bg">
<?php echo get_the_post_thumbnail($page->ID, 'full'); ?>
</div>
<?php } elseif ($postbg == "p4") { ?>
<div id="bg-bg" style="background:<?php echo $pagecolor; ?>"></div>
<?php } ?>

<?php if(!empty($enable_single) && $enable_single == 'right-sidebar') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/single-right-sidebar.php'); ?>

<?php } else if (!empty($enable_single) && $enable_single == 'left-sidebar') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/single-left-sidebar.php'); ?>

<?php } else if (!empty($enable_single) && $enable_single == 'left-right-sidebar') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/single-left-right-sidebar.php'); ?>

<?php } else if (!empty($enable_single) && $enable_single == 'full-width') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/single-full-width.php'); ?>

<?php } else { ?>
<?php } ?>

<?php include (TEMPLATEPATH . '/pre-footer.php'); ?>

<?php get_footer(); ?>