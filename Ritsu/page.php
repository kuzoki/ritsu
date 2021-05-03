<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ritsu-Blog_Template
 */

get_header();
$sideBarStatuPage = get_theme_mod( 'sidebar_toggle_page', false );
?>

<div class="container">
<div class="row">
		<!-- ABOUT ME -->
        <div class="<?php if($sideBarStatuPage !== true): echo "fullwidth" ; else : echo "col-2-3 group" ; endif; ?>">
        <?php the_content() ?>
        </div>
        
        <?php 
            if (  $sideBarStatuPage == true ) : 
                get_sidebar(); 
                endif  ;  
        ?>
   </div>    
</div>
    
<?php

get_footer();