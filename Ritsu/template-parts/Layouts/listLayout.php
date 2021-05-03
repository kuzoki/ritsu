   
    <?php 
            $sideBarStatu = get_theme_mod( 'sidebar_toggle', true );
            //echo $sideBarStatu
    ?>  
   
   <div class="main-content-container">
		<div class="container">
			<div class="row">
				
				<!-- POSTS/ARTICLES SECTION -->
                <div class="<?php if($sideBarStatu !== true): echo "list-fullwidth" ; else : echo "col-2-3 group" ; endif; ?>">
						
						
					
                        <?php
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
								//echo 'worde if front';
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
                                    'post_type' => 'post',
									'paged' => get_query_var( 'paged' ),		
								);
							?>
								<h1 class="side-section-title" style='font-size:25px'>Sreached for: <?php echo $search; ?> </h1>   	
							<?php
							}

                            $blogposts = new WP_Query($args);

                            while ($blogposts->have_posts()) {
                            $blogposts->the_post();
                        ?>

                        <div class="post list-post group">
                            <div class="post-imag">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" class="<?php if($sideBarStatu !== true): echo "list_img_big" ; else : echo "list_img_small" ; endif; ?>" alt="">
                                </a>
                            </div>
                            <div class="post-txt">
                                <div class="post-stats">
                                    <span class="category">
                                        <?php echo the_category();?>
                                    </span>
                                    <p class="stat"><i class="ion-ios-chatbubble"></i><?php echo get_comments_number($post->ID)?> </p>
                                </div>
                                <h1><a href="<?php the_permalink(); ?>" class="post-title medium"><?php echo wp_trim_words(get_the_title(), 8);?></a></h1>
                                <p class="post-date"><?php the_time('F jS, Y');?></p>
                                <div class="body-text">
                               
                                    <?php echo wp_trim_words( get_the_excerpt(), 15 );?>
                                
                                </div>
                            </div>
                        </div>
                        			
                        <?php } 
							
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
				<!-- SIDEBAR -->
                
				<?php 
                    
                    if (  $sideBarStatu == true ) : 
                        get_sidebar(); 
                    endif  ;  
                ?>
			</div>
		</div>
	</div>