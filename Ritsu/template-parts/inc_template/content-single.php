	
<?php
/**
 * The template for displaying all Sibgle Post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ritsu-Blog_Template
 */

get_header();
$sideBarStatuSingle = get_theme_mod( 'sidebar_toggle_single', true );
?>

<div class="<?php if($sideBarStatuSingle !== true): echo "fullwidth" ; else : echo "col-2-3 group" ; endif; ?>">
			<div class="single-style">
				<?php the_post(); ?>
        		<div class='post group '>
					<div class="post-img">
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="big post image">
					</div>
					
					<div class='content-single post-text'>
						<div class="post-stats">
							<span class="category"><?php echo the_category();?></span>
							<p class="stat"><i class="ion-ios-chatbubble"></i><?php echo get_comments_number()?> </p>	
						</div>
						<h1 class="post-title big"><?php echo get_the_title();?></h1>
						<div class="post-date marg"><?php the_time('F jS, Y');?></div>
						<?php the_content() ?>
					</div>
					<div class="post-meta group">
						<p class="post-author">By 
							<span>
								<?php 
									 the_author();
								?>
							</span>
						</p>
						<div class="social-icons">
							<!-- <p class="post-share">Share</p> -->
							<?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
						</div>
					</div>
				</div>

				
				<div class="post suggested-posts">
						<h5 class="section-title">You Might Also Like</h5>
						<div class="row">
							<?php 
                                if($sideBarStatuSingle !== true){
                                    $per_page = 4;
                                }else{
                                    $per_page = 3;
                                }

								$postcat = get_the_category( $wp_query->post->ID );
								$cat_id = $postcat[0]->term_id ;
								//echo $cat ;
								$args = array(
									'posts_per_page' => $per_page,
									'cat' => $cat_id,
									'orderby' => 'comment_count',
									'order' => 'DESC',
									
								);
								$relatedpost = new WP_Query($args);

								while ($relatedpost->have_posts()) {
									$relatedpost->the_post();
							?>
							<div class="<?php if($sideBarStatuSingle !== true): echo "col-1-4" ; else : echo "col-1-3" ; endif; ?>">
								<div class="suggested-post">
									<a href="post-sidebar.html"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="post image"></a>
									<a href="post-sidebar.html" class="sm-post-title"><?php echo wp_trim_words(get_the_title(), 8);?></a>
									<p class="post-date"><?php the_time('F jS, Y');?></p>
								</div>
							</div>
							<?php 
								} 
								wp_reset_query();	
								
							?>
						</div>
				</div>
				
					<?php 
				
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				
			</div>
		
		</div>
		<?php 
            if (  $sideBarStatuSingle == true ) : 
                get_sidebar(); 
                endif  ;  
        ?>