	
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all post by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'post' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ritsu-Blog_Template
 */

get_header();
$sideBarStatuSingle = get_theme_mod( 'sidebar_toggle_single', true );
?>



<div class="container">
	<div class="row">
		<!-- Single ME -->
       
		<?php  
            get_template_part('template-parts/inc_template/content-single');  
            
        ?>
		
        
        
   </div>    
</div>

<?php

get_footer();
