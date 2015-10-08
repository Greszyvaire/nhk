<div class="post link" id="post-<?php the_ID(); ?>">

	<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><a href="<?php echo get_post_format_link('link'); ?>"><span class="post-type-link">&nbsp;</span></a></h5>

	<?php the_content(); ?>
	
		<p class="link-date"><?php _e('Posted','siiimple') ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'siiimple'); ?></p>
   
</div><!-- END POST -->

