<?php $recentPosts = new WP_Query(array('showposts' => 9, 'post_type' => array('dg',  'mycustomposttype2','mycustomposttype3')));
					while( $recentPosts->have_posts() ) : 
					$recentPosts->the_post(); ?>
					
					<?php $thumbblog = get_post_thumbnail_id();
						$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
						$imageblog = aq_resize( $img_url_blog, 150, 150, true ); ?>

					<img src="<?php echo $imageblog ?>">

					<?php endwhile; ?>