
<?php 
    $sideBarStatu = get_theme_mod( 'sidebar_toggle', true );
    //echo $sideBarStatu
?> 
<div class="main-content-container">
		<div class="container">
			<div class="row">
				
				<!-- POSTS/ARTICLES SECTION -->
                <div class="<?php if($sideBarStatu !== true): echo "col-1 big-post-w " ; else : echo "col-2-3 group" ; endif; ?>">
						
						<?php
							get_template_part('template-parts/inc_template/featuredPost'); 
						?>
						
					<div class="row">
                        <?php
						// 	$default_posts_per_page = get_option( 'posts_per_page' );
						// //echo $default_posts_per_page;
						
							if(is_home()){
								$args = array(
									'post_type' => 'post',
													
									'paged' => get_query_var( 'paged' ),
									
									//'offset' => 5,
								);
								//echo 'worde if statment';
							}else if(is_front_page()){
								$args = array(
									'post_type' => 'post',
									'posts_per_page' => 10,
									'orderby' => 'comment_count',
									'order' => 'DESC',					
								);
								
							}elseif(is_category()){
								$cat = single_cat_title( '', false );;
								//echo $cat;
								//print_r($cat) ;
								$args = array(
									'category_name'	=>$cat,		
								);
							?>
								<h1 class="side-section-title" style='font-size:25px'>Category: <?php echo $cat; ?> </h1>   	
							<?php
							}elseif(is_search()){
								$search = get_search_query();
								$args = array(
									's'	=>$search,
											
								);
							?>
								<h1 class="side-section-title" style='font-size:25px'>Sreached for: <?php echo $search; ?> </h1>   	
							<?php
							}

						
                            $blogposts = new WP_Query($args);

                            while ($blogposts->have_posts()) {
                            $blogposts->the_post();
                        ?>
						
						<h1><?php //echo $paged() ?></h1>

                        <div class="<?php if($sideBarStatu !== true): echo "col-1-3" ; else : echo "col-1-2 group" ; endif; ?>">
							<div class="post normal-post">
								<div class="post-img">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="post image" class="post-image">
									</a>
								</div>
								<div class="post-text">
									<div class="post-stats">
                                        <span class="category"><?php //
											echo the_category();?></span>
											<?php
											// $cat = get_the_category(); $cat = $cat[0]; echo $cat->cat_name;
											?>
											<p class="stat"><i class="ion-ios-chatbubble"></i><?php echo get_comments_number($post->ID)?> </p>
											
									</div>
									<h1 class="title-on">
										<a href="<?php the_permalink(); ?>" class="post-title medium trim"><?php echo get_the_title();?></a>
										<span class="full-title"><?php echo get_the_title()?></span>
									</h1>
									
									<p class="post-date"><?php the_time('F jS, Y');?></p>
									<a href="<?php the_permalink(); ?>" class="btn">Read More</a>
									
								</div>
							</div>
						</div>
								
                        <?php 
						
                            } 
							
                            wp_reset_query();
							
							?>
						<div class="col-1">
							<?php	
								//previous_posts_link();
								//next_posts_link();
								if (is_home()): echo paginate_links(); endif; 
							?>
						</div>
						<?php 
							if(is_front_page()):
							echo '<div class="col-1"><a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '" class="btn pagination-btn">Older Post</a></div>'; 
							endif;
						?>
						
                    </div>
                </div>
				<!-- SIDEBAR -->
				<?php 
                    
                    if (  $sideBarStatu == true ) : 
                        get_sidebar(); 
                    endif  ;  
                ?>
			</div>
		</div>
	</div>