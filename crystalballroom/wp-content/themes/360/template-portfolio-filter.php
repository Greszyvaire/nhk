<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 * Template Name: Template Portfolio Filter
 */
global $data;
get_header(); ?>

<?php $social = get_post_meta($post->ID, 'siiimple_social_media', TRUE); ?>
<?php if(!empty($social) && $social == 'light') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar-light.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'dark') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'none') { ?>
<?php } ?>

<?php include (TEMPLATEPATH . '/framework/includes/bg.php'); ?>

<div id="portfolio1" class="container f-port">

<div class="grid16 col top-header">
	
		<h1 class="main-header-title"><?php the_title(); ?></h1>
		
		<?php if(!empty($data['tagline_portfolio'])) { ?>
		<p class="portfolio"><?php echo $data['tagline_portfolio']; ?></p>
		<?php } ?>
	
	</div>
	
	<div class="clear" style="height:50px;"></div>
	
	<ul class="filter clearfix">
					
		<li class="active"><a href="javascript:void(0)" class="all">All</a></li>
					
			<?php
				
				$terms = get_terms('filter', $args);
				$count = count($terms); 
				$i=0;
						
				if ($count > 0) {
				
					foreach ($terms as $term) {
						
						$i++;
						
						$term_list .= '<li><a href="javascript:void(0)" class="'. $term->slug .'">' . $term->name . '</a></li>';
								
						if ($count != $i)
							{
							$term_list .= '';
							}
							else 
							{
								$term_list .= '';
							}
						}

					echo $term_list;
					}
				?>
		</ul>
				
		<ul class="filterable-grid columns clearfix">
			
			<?php		
			query_posts(array(
                'post_type'=>'portfolio',
				'posts_per_page' => $data['portfolio_num'],
                'paged'=>$paged
            ));
            ?>
            
            <?php
			$count=0;
            while (have_posts()) : the_post();
			$count++;
			?>
					
					<?php 
						// Get The Taxonomy 'Filter' Categories
						$terms = get_the_terms( get_the_ID(), 'filter' ); 
					?>
					
					<?php 
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'index-portfolio' ); //get full URL to image (use "large" or "medium" if the images too big)
					$image = aq_resize( $img_url, 240, 220, true ); //resize & crop the image
					$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full-thumb', false, '' ); 
					$large_image = $large_image[0]; 
					$port_excerpt = get_post_meta($post->ID, 'siiimple_port_excerpt', TRUE);
					$video = get_post_meta($post->ID, 'siiimple_video', TRUE);
					$enable_port_title = get_post_meta($post->ID, 'siiimple_port_title', TRUE);
					?>
					
							
							<li class="po" data-id="id-<?php echo $count; ?>" data-type="<?php foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } ?>">
											
									<?php if ($video) { ?>
									
									<a href="#"><iframe src="<?php echo $video; ?>" width="240" height="240" frameborder="0" class="vid"></iframe></a>	
				
									
									<?php } else { ?>	

									<?php 
										// Check if wordpress supports featured images, and if so output the thumbnail
										if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : 
									?>
										
									
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										
											<span class="rollover"></span>
										
											<img src="<?php echo $image ?>"/>
										
										</a>
										
										<div class="port-info">
                    
                							<h5><?php the_title(); ?></h5>
                  							<p><?php echo $port_excerpt; ?></p>
                
                						</div>
										
									<?php endif; ?>
									
									<?php } ?>
									
							</li>
	
					<?php endwhile; ?>
			
			</ul>
		
		<div class="clear"></div>
	
	<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
	
	</div><!-- #content END -->
	
<?php include (TEMPLATEPATH . '/pre-footer.php'); ?>	

<?php get_footer(); ?>