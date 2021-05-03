<?php
/**
 * The template for Category Navigator
 * The Slider only displayed in front page.
 *
 * @package Ritsu-Blog Template
 */

?> 




<?php 
	$ct1=  get_theme_mod( 'select_demo1', 'cat' );
	$category1 = get_category( $ct1 ); 
	$image1 = get_theme_mod( 'image_setting_url_1', '' );

	$ct2=  get_theme_mod( 'select_demo2', 'cat' );
	$category2 = get_category( $ct2 ); 
	$image2 = get_theme_mod( 'image_setting_url_2', '' );

	$ct3=  get_theme_mod( 'select_demo3', 'cat' );
	$category3 = get_category( $ct3 ); 
	$image3 = get_theme_mod( 'image_setting_url_3', '' );

	$ct4=  get_theme_mod( 'select_demo4', 'cat' );
	$category4 = get_category( $ct4 ); 
	$image4 = get_theme_mod( 'image_setting_url_4', '' );

	$ct5=  get_theme_mod( 'select_demo5', 'cat' );
	$category5 = get_category( $ct5 ); 
	$image5 = get_theme_mod( 'image_setting_url_5', '' );
																
?>
<div class="top-categories">
		<div class="container">
			<div class="row">
				<div class="col-1-5">
					
					<div class="top-cat-single">
						<img src="<?php echo esc_url( $image1 ); ?>" alt="top categorie">
						<a href="<?php echo get_category_link( $category1 ) ?>" class="top-cat-title"><?php echo $category1->cat_name; ?></a>
					</div>
				</div>
				<div class="col-1-5">
					<div class="top-cat-single">
						<img src="<?php echo esc_url( $image2 ); ?>" alt="top categorie">
						<a href="<?php echo get_category_link( $category2 ) ?>" class="top-cat-title"><?php echo $category2->cat_name; ?></a>
					</div>
				</div>
				<div class="col-1-5">
					<div class="top-cat-single">
						<img src="<?php echo esc_url( $image3 ); ?>" alt="top categorie">
						<a href="<?php echo get_category_link( $category3 ) ?>" class="top-cat-title"><?php echo $category3->cat_name; ?></a>
					</div>
				</div>
				<div class="col-1-5">
					<div class="top-cat-single">
						<img src="<?php echo esc_url( $image4 ); ?>" alt="top categorie">
						<a href="<?php echo get_category_link( $category4 ) ?>" class="top-cat-title"><?php echo $category4->cat_name; ?></a>
					</div>
				</div>
				<div class="col-1-5">
					<div class="top-cat-single">
						<img src="<?php echo esc_url( $image5 ); ?>" alt="top categorie">
						<a href="<?php echo get_category_link( $category5 ) ?>" class="top-cat-title"><?php echo $category5->cat_name; ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>