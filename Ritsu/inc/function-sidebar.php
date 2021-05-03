<?php 


 /*
    @package Alex Template

    ===============================
         Side Bar Setting
    ===============================

*/



function my_custom_footer() {
    register_sidebar(
        array (
            'name' => __( 'Footer', 'your-theme-domain' ),
            'id' => 'footer-1',
            'class' => 'custom',
            'description' => __( 'Custom Footer', 'your-theme-domain' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<div class="section_header"><h2 class="header_title">',
            'after_title' => '</h2></div>',
        )
    );
    
}
add_action( 'widgets_init', 'my_custom_footer' );
