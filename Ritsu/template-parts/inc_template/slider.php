<?php
/**
 * Version : v.1 
 * Update : Comming soone
 * The template for Slider 
 * The Slider only displayed in front page.
 * outomatic will display the mosted commented post
 * @package Ritsu-Blog Template
 */

?> 
<div class="slider">
	<div class="hero-slider-navigation group">
		<a href="#" class="hero-prev"><i class="ion-ios-arrow-left"></i></a>
		<div class="hero-controls-container"></div>
		<a href="#" class="hero-next"><i class="ion-ios-arrow-right"></i></a>
	</div>
	<div class="flex-slider">
		<ul class="slides">
			<?php 
			 	if ( is_front_page() OR is_page()) :
					//$sticky = get_option( 'sticky_posts' );
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 3,
					'orderby' => 'comment_count',
					//'post__not_in'        => $sticky,
				);
				$blogposts = new WP_Query($args);

				while ($blogposts->have_posts()) {
				$blogposts->the_post();
						
				?>
				
					
					<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="" draggable="false">
						<div class="content-wrap">
							<div class="post-header">
								<div class="post-stats">
									<span class="category"><?php echo the_category();?></span>
											<?php
											// $cat = get_the_category(); $cat = $cat[0]; echo $cat->cat_name;
											?>
									<p class="stat"><i class="ion-ios-chatbubble"></i><?php echo get_comments_number($post->ID)?></p>
											
									</div>
										<h1><a href="<?php the_permalink(); ?>" class="post-title big"><?php echo get_the_title()?></a></h1>
										<p class="post-date"><?php the_time('l, F jS, Y') ?></p>
										<a href="<?php the_permalink(); ?>" class="btn">Read More</a>
									</div>
								</div>
								
					</li>
							
							
						
			<?php
			} 
			wp_reset_query();	
			endif	
			?> 
		</ul>
	</div>
</div>