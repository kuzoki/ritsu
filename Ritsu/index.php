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
    $layout = get_theme_mod( 'layout_image_setting','defaultLayout');
    
?>

    <?php if ( true == get_theme_mod( 'checkbox_setting', true ) ) : 
        get_template_part('template-parts/inc_template/slider');  
        endif  ; 
        
    ?>
        
    <?php if (  get_theme_mod( 'category_toggle_setting', true ) == true ) : 
        get_template_part('template-parts/inc_template/category-nav');  
        endif  ; 
        get_template_part('template-parts/Layouts/'.$layout.''); 
    ?>  
    


<?php

get_footer();


