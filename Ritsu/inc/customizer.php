<?php
/**
 * retsu Theme Customizer
 *
 * @package retsu
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
    function cali_customize_register( $wp_customize ) {
        $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
        //$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
        $wp_customize->get_section( 'colors' )->panel 				= 'retsu_colors';
        $wp_customize->get_section( 'colors' )->priority 			= '7';
        $wp_customize->get_section( 'colors' )->title = 			__( 'General' , 'cali');
        $wp_customize->get_section( 'header_image' )->priority 		= '6';

        if ( isset( $wp_customize->selective_refresh ) ) {
            $wp_customize->selective_refresh->add_partial( 'blogname', array(
                'selector'        => '.site-title a',
                'render_callback' => 'cali_customize_partial_blogname',
            ) );
            $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
                'selector'        => '.site-description',
                'render_callback' => 'cali_customize_partial_blogdescription',
            ) );
        }
    }
    add_action( 'customize_register', 'cali_customize_register' );


        /**
     * Render the site title for the selective refresh partial.
     *
     * @return void
     */
    function ritsu_customize_partial_blogname() {
        bloginfo( 'name' );
    }

    /**
     * Render the site tagline for the selective refresh partial.
     *
     * @return void
     */
    function ritsu_customize_partial_blogdescription() {
        bloginfo( 'description' );
    }



    /* Options Layout */
    function ritsu_layout_option( $wp_customize ){
       

    
            Kirki::add_config( 'Ritsu_config', array(
                'capability'    => 'edit_theme_options',
                'option_type'   => 'theme_mod',
            ) );
           
            Kirki::add_panel( 'panel_new', array(
                'priority'    => 1,
                'title'       => esc_html__( 'Theme Layout Option', 'kirki' ),
                'description' => esc_html__( 'My panel description', 'kirki' ),
                
            ) );
            // Section Slider 
            Kirki::add_section( 'slider_section', array(
                'title'          => esc_html__( 'Layout Theme Ritsu Setting', 'kirki' ),
                'description'    => esc_html__( 'My section description.', 'kirki' ),
                'panel'          => 'panel_new',
                'priority'       => 1,
            ) );

            

            Kirki::add_field( 'Ritsu_config', [
                'type'        => 'toggle',
                'settings'    => 'checkbox_setting',
                'label'       => esc_html__( 'Slider Control', 'kirki' ),
                'description' => esc_html__( 'Check The Box If You Dont want Slider On you Home Page', 'kirki' ),
                'section'     => 'slider_section',
                'default'     => true,
                
                    
            ] );
            
            // Global Display Slider theme

            Kirki::add_field( 'Ritsu_config', [
                'type'        => 'toggle',
                'settings'    => 'sidebar_toggle',
                'label'       => esc_html__( 'Display SideBar', 'kirki' ),
                'description' => esc_html__( 'Check The Box To hide SideBar', 'kirki' ),
                'section'     => 'slider_section',
                'default'     => true,   
            ] );

            // Single post page SideBar display

            Kirki::add_field( 'Ritsu_config', [
                'type'        => 'toggle',
                'settings'    => 'sidebar_toggle_single',
                'label'       => esc_html__( 'Display SideBar In Post Page', 'kirki' ),
                'description' => esc_html__( 'Check The Box To hide SideBar In Single Post Page', 'kirki' ),
                'section'     => 'slider_section',
                'default'     => true,   
            ] );    

            // Single page About Contact SideBar display

            Kirki::add_field( 'Ritsu_config', [
                'type'        => 'toggle',
                'settings'    => 'sidebar_toggle_page',
                'label'       => esc_html__( 'Display SideBar In Pages', 'kirki' ),
                'description' => esc_html__( 'Check The Box To hide SideBar In Single Post Page', 'kirki' ),
                'section'     => 'slider_section',
                'default'     => false,   
            ] );    

            // Theme Style Option
            Kirki::add_field( 'Ritsu_config', [
                'type'        => 'radio-image',
                'settings'    => 'layout_image_setting',
                'label'       => esc_html__( 'Layout Options', 'kirki' ),
                'section'     => 'slider_section',
                'default'     => 'defaultLayout',
                'priority'    => 10,
                'choices'     => [
                    'defaultLayout'   => get_template_directory_uri() . '/assets/images/asset1.png',
                    'standardLayout' => get_template_directory_uri() . '/assets/images/asset2.png',
                    'gridLayout'  => get_template_directory_uri() . '/assets/images/asset4.png',   
                    'listLayout'  => get_template_directory_uri() . '/assets/images/asset33.png',   
                ],
                'input_attrs' => array(
                    'style' => 'width:100px;height:100px;margin:0 10px 10px 0',
                ),
            ] );

            /* ********* lAYOUT DISPLAY OPTION FOR THE THEME ********** */ 



            //   Category  Navigator **************************************

                Kirki::add_section( 'cat_section', array(
                    'title'          => esc_html__( 'Category Section widget', 'kirki' ),
                    'description'    => esc_html__( 'My section description.', 'kirki' ),
                    'panel'          => 'panel_new',
                    'priority'       => 1,
                ) );

                Kirki::add_field( 'theme_config_id2', [
                    'type'        => 'toggle',
                    'settings'    => 'category_toggle_setting',
                    'label'       => esc_html__( 'Display Category Navigator', 'kirki' ),
                    'description' => esc_html__( 'Show the Category Nav', 'kirki' ),
                    'section'     => 'cat_section',
                    'default'     => true,
                    
                        
                ] );
                $args = array("hide_empty" => 0,
                        "type"      => "post",      
                        "orderby"   => "name",
                        "order"     => "ASC" 
                    ); 
                $cats = get_categories($args);
                //print_r($cats);
        
                $myarray= array();
                foreach ($cats as $x ) {
                    $name = "$x->cat_name";
                    $id = "$x->cat_ID";
                    
                    $myarray[$id]=$name;
                    //print_r($format);
                }
                //$myarray= array('orderby' => 'name',);
                //print_r($myarray);
                /*
                        Category 1 and it image
                
                */
                    Kirki::add_field( '', array(
                        'type'        => 'select',
                        'settings'    => 'select_demo1',
                        'label'       => __( 'Select Category For the 1 Tab', 'kirki' ),
                        
                        
                        'section'     => 'cat_section',
                        'default'     => '',
                        'priority'    => 10,
                        'choices'     => $myarray,
                    
                    ) );
                    Kirki::add_field( 'theme_config_id', [
                        'type'        => 'image',
                        'settings'    => 'image_setting_url_1',
                        'label'       => esc_html__( 'Image Control For Category 1 (URL)', 'kirki' ),
                        'section'     => 'cat_section',
                        'default'     => '',
                    ] );
                    /*
                            Category 2 and it image
                    
                    */       
                        Kirki::add_field( '', array(
                            'type'        => 'select',
                            'settings'    => 'select_demo2',
                            'label'       => __( 'Select Category For the 2 Tab', 'kirki' ),
                            'section'     => 'cat_section',
                            'default'     => '',
                            'priority'    => 10,
                            'choices'     => $myarray,
                        
                        ) );
                        Kirki::add_field( 'theme_config_id', [
                            'type'        => 'image',
                            'settings'    => 'image_setting_url_2',
                            'label'       => esc_html__( 'Image Control Category  2 ab(URL)', 'kirki' ),
                            'description' => esc_html__( 'Description Here.', 'kirki' ),
                            'section'     => 'cat_section',
                            'default'     => '',
                        ] );

                    /*
                            Category 3 and it image
                    
                    */    
                    Kirki::add_field( '', array(
                        'type'        => 'select',
                        'settings'    => 'select_demo3',
                        'label'       => __( 'Select Category For the 3 Tab', 'kirki' ),
                        'section'     => 'cat_section',
                        'default'     => '',
                        'priority'    => 10,
                        'choices'     => $myarray,
                    
                    ) );
                    Kirki::add_field( 'theme_config_id', [
                        'type'        => 'image',
                        'settings'    => 'image_setting_url_3',
                        'label'       => esc_html__( 'Image Control Category  2 ab(URL)', 'kirki' ),
                        'description' => esc_html__( 'Description Here.', 'kirki' ),
                        'section'     => 'cat_section',
                        'default'     => '',
                    ] );
                    /*
                            Category 4 and it image
                    
                    */  
                    Kirki::add_field( '', array(
                        'type'        => 'select',
                        'settings'    => 'select_demo4',
                        'label'       => __( 'Select Category For the 4 Tab', 'kirki' ),
                        'section'     => 'cat_section',
                        'default'     => '',
                        'priority'    => 10,
                        'choices'     => $myarray,
                    
                    ) );
                    Kirki::add_field( 'theme_config_id', [
                        'type'        => 'image',
                        'settings'    => 'image_setting_url_4',
                        'label'       => esc_html__( 'Image Control Category  2 ab(URL)', 'kirki' ),
                        'description' => esc_html__( 'Description Here.', 'kirki' ),
                        'section'     => 'cat_section',
                        'default'     => '',
                    ] );
                    /*
                            Category 5 and it image
                    
                    */  
                    Kirki::add_field( '', array(
                        'type'        => 'select',
                        'settings'    => 'select_demo5',
                        'label'       => __( 'Select Category For the 5 Tab', 'kirki' ),
                        'section'     => 'cat_section',
                        'default'     => '',
                        'priority'    => 10,
                        'choices'     => $myarray,
                    
                    ) );
                    Kirki::add_field( 'theme_config_id', [
                        'type'        => 'image',
                        'settings'    => 'image_setting_url_5',
                        'label'       => esc_html__( 'Image Control Category  2 ab(URL)', 'kirki' ),
                        'description' => esc_html__( 'Description Here.', 'kirki' ),
                        'section'     => 'cat_section',
                        'default'     => '',
                    ] );



            
    }
    add_action( 'customize_register', 'ritsu_layout_option');
















  