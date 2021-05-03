<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ritsu-Blog_Template
 */

?>

<footer>
		<div class="container">
			<div class="row">
				<div class="col-1-3">
					<p class="copyright">© <?php echo date('Y')?> - ALL RIGHTS RESERVED</p>
				</div>
				<div class="col-1-3">
					<div class="social-icos">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-menu',
									'menu_id'        => 'menu-footer',
									'menu_class'           => 'menu-footer',
								)
							);

							
						?>
					</div>
				</div>
				<div class="col-1-3">
					<p class="portgasthemes"> <a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a> - <?php bloginfo( 'description' ); ?> <i class="ion-ios-heart"></i></p>
				</div>
			</div>
		</div>
	</footer>


<?php wp_footer(); ?>

</body>
</html>
