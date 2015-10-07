<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 */
global $data;
?>

<div class="clear"></div>
		
<div class="footer-wrap container footer-area">
	
		<div class="footer-end">
		
			
		
			<?php $social_links = array('twitter','dribbble','forrst','flickr','google','googleplus','facebook','linkedin','youtube','vimeo','rss','support','mail'); ?>
			
			<ul class="footer-social">
			
			<?php
           
            foreach($social_links as $social_link) {
                if(!empty($data[$social_link])) {
                    	echo '<li><a href="'. $data[$social_link] .'" title="'. $social_link .'" target="_blank" class="demo-tip-twitter"><img src="'. get_template_directory_uri() .'/framework/images/social/'.$social_link.'.png" alt="" /></a></li>';
					}
            }
           
            ?>
            
			</ul>

		</div><!-- END FOOTER END -->
		

</div><!-- END FOOTER WRAP -->