<?php
	if ( is_front_page() ) :
        $args = array(
            'posts_per_page' => 1,
			'post__in' => get_option( 'sticky_posts' ),
			'ignore_sticky_posts' => 1
         );
        $blogposts = new WP_Query($args);

        while ($blogposts->have_posts()) {
            $blogposts->the_post();
        ?>
                    
		<div class="post big-post">
			<div class="post-img">
				<a href="<?php the_permalink(); ?>">
					<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="big post image" class="post_big_wp">
				</a>
			</div>
			<div class="post-text">
				<div class="post-stats">
					<span class="category"><?php echo the_category();?></span>
					<p class="stat"><i class="ion-ios-chatbubble"></i><?php echo get_comments_number($post->ID)?> </p>
				</div>
					<h1>
                        <a href="<?php the_permalink(); ?>" class="post-title big"><?php echo wp_trim_words(get_the_title(), 8);?></a>
                    </h1>
					<p class="post-date"><?php the_time('F jS, Y');?></p>
					<div class="body-text">
						<?php echo the_excerpt();?>
					</div>
					<a href="<?php the_permalink(); ?>" class="btn">Read More</a>
				</div>
			</div>
		<?php 
            } 
            wp_reset_query();	
			endif	
        ?>