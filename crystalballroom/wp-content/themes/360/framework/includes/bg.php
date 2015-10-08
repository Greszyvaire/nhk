<?php $pagecolor = get_post_meta($post->ID, 'siiimple_page_color', TRUE); ?>
<?php $parallax = get_post_meta($post->ID, 'siiimple_parallax', TRUE); ?>

<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>

<div class="line"></div>
	
	<div id="bg-bg">
		<?php echo get_the_post_thumbnail($page->ID, 'full'); ?>
	</div>
	
<?php } elseif ($pagecolor) { ?>

	<div id="bg-bg" style="background:<?php echo $pagecolor; ?>"></div>
	
<?php } elseif ($parallax == 'p1') { ?>

<div class="line"></div>

<script type="text/javascript">
var wf_pbb_object = [
{bc:"rgb(0, 0, 0)"},
{img:"http://web-features.net/patterns/25.png", mm:true, ms:false, mms:5, mss:10, mmd:1, mso:"v", msd:1, im:"image", pr:"y", mma:"both", ofs:{x:0, y:0}, zi:1, sr:true, sb:false, isr:false, isb:false},
{img:"http://web-features.net/patterns/05.png", mm:true, ms:false, mms:1, mss:10, mmd:-1, mso:"v", msd:1, im:"pattern", pr:"both", mma:"both", ofs:{x:0, y:0}, zi:2, sr:false, sb:false, isr:false, isb:false}
];
</script>
<script type="text/javascript" src="http://web-features.net/api/wf.pbb.api.js"></script>

<?php } elseif ($parallax == 'p2') { ?>

<div class="line"></div>

<script type="text/javascript">
var wf_pbb_object = [
{bc:"rgb(25, 25, 25)"},
{img:"<?php echo get_template_directory_uri(); ?>/framework/images/parallax/p1.png", mm:true, ms:false, mms:10, mss:10, mmd:1, mso:"v", msd:1, im:"image", pr:"y", mma:"both", ofs:{x:0, y:0}, zi:1, sr:true, sb:false, isr:false, isb:false},
{img:"<?php echo get_template_directory_uri(); ?>/framework/images/parallax/para.png", mm:true, ms:false, mms:3, mss:10, mmd:-1, mso:"v", msd:1, im:"pattern", pr:"both", mma:"both", ofs:{x:0, y:0}, zi:2, sr:false, sb:false, isr:false, isb:false}
];
</script>
<script type="text/javascript" src="http://web-features.net/api/wf.pbb.api.js"></script>

<?php } else { ?> 

	<div id="bg-bg">
		<img src="<?php echo get_template_directory_uri(); ?>/framework/images/no-image.png">
	</div>

<?php } ?>

