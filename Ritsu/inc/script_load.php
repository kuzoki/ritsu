<?php


/*

    Enqueue scripts and My Custom styles and script.

*/ 
function load_stylesheets()
{
	

	wp_register_style('fonts','//fonts.googleapis.com/css?family=Lato:300,400,500,600,800', array(), false, 'all');
	wp_enqueue_style('fonts');

	

    wp_register_style('icon', get_template_directory_uri().'/font/ionicons.eot', array(), false, 'all');
    wp_enqueue_style('icon');

	

	wp_register_style('mainstyle', get_template_directory_uri().'/css/app.css', array(), rand( 1, 99999999999 ), 'all');
	wp_enqueue_style('mainstyle');
}

add_action('wp_enqueue_scripts', 'load_stylesheets');

/*

    Load Scripts Files For Ritsu

*/ 

function loadjs()
{
    wp_register_script('jq', get_template_directory_uri().'/js/jquery-3.3.1.min.js', "", 0, true);
    wp_enqueue_script('jq');
    

    wp_register_script('jqueryflexslider', get_template_directory_uri().'/js/jquery.flexslider.js', "", 1, true);
    wp_enqueue_script('jqueryflexslider');

    wp_register_script('jqueryslicknav', get_template_directory_uri().'/js/jquery.slicknav.js', "", 1, true);
    wp_enqueue_script('jqueryslicknav');

    

	wp_register_script('app', get_template_directory_uri().'/js/app.js', "", 1, true);
    wp_enqueue_script('app');
}
add_action('wp_enqueue_scripts', 'loadjs');