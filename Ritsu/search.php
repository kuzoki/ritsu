<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package GIN
 */

get_header();
$layout = get_theme_mod( 'layout_image_setting','defaultLayout' )
?>

        <?php 
            if (  get_theme_mod( 'category_toggle_setting', true ) == true ) : 
                get_template_part('template-parts/inc_template/category-nav');  
                endif  ; 
             //the_archive_title( '<h1 class="page-title">', '</h1>' );
            if ( have_posts() ) : ?>

        

            <?php 
                get_template_part('template-parts/Layouts/'.$layout.''); 
            ?> 
                
     
                
                
    <?php    
        else :
            
            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?> 
    


<?php

get_footer();
