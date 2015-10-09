<?php $social_options = get_post_meta($post->ID, 'siiimple_social_options', TRUE); ?>
<?php $social_links = array('twitter','dribbble','forrst','flickr','google','googleplus','facebook','linkedin','youtube','vimeo','rss','support','mail'); ?>
		
<div class="social-media-bar light-social">
		
	<ul>
			
		<?php
           
            foreach($social_links as $social_link) {
                if(!empty($data[$social_link])) {
                    	echo '<li><a href="'. $data[$social_link] .'" title="'. $social_link .'" target="_blank" class="demo-tip-twitter"><img src="'. get_template_directory_uri() .'/framework/images/social/'.$social_link.'.png" alt="" /></a></li>';
					}
            }
           
            ?>
            
	</ul>
		
</div>
		
