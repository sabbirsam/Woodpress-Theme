<?php
/**
 * define constand for kirki
 */

 define('WOODPRESS_CUSROMIZER_CONFIG_ID', 'woodpress_customizer_settings_id');
 define('WOODPRESS_CUSROMIZER_PANEL_ID', 'woodpress_customizer_panel');
if (class_exists('Kirki')) {
    Kirki::add_config(WOODPRESS_CUSROMIZER_CONFIG_ID, array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ));


    /**
     * Panel Add 
     */

    Kirki::add_panel(WOODPRESS_CUSROMIZER_PANEL_ID, array(
        'priority'    => 10,
        'title'       => esc_html__('WoodPress Homepage Panel', 'woodpress'),
        'description' => esc_html__('WoodPress Homepage settings', 'woodpress'),
    ));



/**
 * >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
 */

     /**
      * Commomn Top Menu 
      */

      Kirki::add_section('woodpress_header_topmenu_id', array( //section id
        'title'          => esc_html__('Top bar Settings', 'woodpress'),
        'panel'          => WOODPRESS_CUSROMIZER_PANEL_ID,
        'priority'       => 160,
        
    ));


    Kirki::add_field(WOODPRESS_CUSROMIZER_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'woodpress_Top_enable', //use it as condition
        'label'       => esc_html__('Enable Top Mail', 'woodpress'),
        'section'     => 'woodpress_header_topmenu_id',
        'default'     => 'on',
        'priority'    => 10,
        'choices'     => [
            'on'  => esc_html__('Display', 'woodpress'),
            'off' => esc_html__('Hide', 'woodpress'),
        ],
    ]);



    Kirki::add_field(WOODPRESS_CUSROMIZER_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'woodpress_header_top_mail',
        'label'    => esc_html__('Top Baner Mail', 'woodpress'),
        'section'  => 'woodpress_header_topmenu_id',
        'default'  => esc_html__('woodpress@gmail.com', 'woodpress'),
        'priority' => 10,

        'active_callback' => [
            [
                'setting'=>'woodpress_Top_enable',
                'operator' =>'==',
                'value'=> true,
            ]
        ]

    ]);



    Kirki::add_field(WOODPRESS_CUSROMIZER_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'woodpress_top_slogan',
        'label'    => esc_html__('Top Header Text', 'woodpress'),
        'section'  => 'woodpress_header_topmenu_id',
        'default'  => esc_html__('Free Shipping for all Order of $99', 'woodpress'),
        'priority' => 10,

        'active_callback' => [
            [
                'setting'=>'woodpress_Top_enable',
                'operator' =>'==',
                'value'=> true,
            ]
        ]

    ]);


    Kirki::add_field( WOODPRESS_CUSROMIZER_CONFIG_ID, [
        'type'        => 'repeater',
        'label'       => esc_html__( 'Social Menu', 'woodpress' ),
        'section'     => 'woodpress_header_topmenu_id',
        'priority'    => 10,

        'active_callback' => [
            [
                'setting'=>'woodpress_Top_enable',
                'operator' =>'==',
                'value'=> true,
            ]
        ],

        
        'row_label' => [
            'type'  => 'text',
            'value' => esc_html__( 'Social Information field', 'woodpress' ),
        ],
        'button_label' => esc_html__('"Add new" button label (optional) ', 'woodpress' ),
        'settings'     => 'woodpress_social_repeater_setting',
        'default'      => [
            [
                'link_text' => esc_html__( 'fa fa-facebook', 'woodpress' ),
                'link_url'  => 'https://www.facebook.com/',
            ],
            [
                'link_text' => esc_html__( 'fa fa-twitter', 'woodpress' ),
                'link_url'  => 'https://twitter.com/',
            ],

            [
                'link_text' => esc_html__( 'fa fa-linkedin', 'woodpress' ),
                'link_url'  => 'https://linkedin.com/',
            ],

            [
                'link_text' => esc_html__( 'fa fa-pinterest-p', 'woodpress' ),
                'link_url'  => 'https://pinterest.com/',
            ],
        ],
        'fields' => [
            'link_text' => [
                'type'        => 'text',
                'label'       => esc_html__( 'Icon', 'woodpress' ),
                'description' => esc_html__( 'This will be the icon for your social link(use https://fontawesome.com/v4.7/)', 'woodpress' ),
                'default'     => '',
            ],
            'link_url'  => [
                'type'        => 'text',
                'label'       => esc_html__( 'Link URL', 'woodpress' ),
                'description' => esc_html__( 'This will be the link URL', 'woodpress' ),
                'default'     => '',
            ],
        ]
    ] );


    


    /**
     * >>>>> end
     */



    /**
     *
     * Top Banner: Section add
     */

    Kirki::add_section('woodpress_homepage_id', array( //section id
        'title'          => esc_html__('Top Baner Settings', 'woodpress'),
        'panel'          => WOODPRESS_CUSROMIZER_PANEL_ID,
        'priority'       => 160,

        'active_callback' => function () {
            return is_page_template("page-templates/homepage.php");
        }
    ));

    /**
     * Top Banner: Section Field
     * >>>>>>>>>>>>>>>>>>>>>>>>>Hero Banner field begin
     */
    Kirki::add_field(WOODPRESS_CUSROMIZER_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'woodpress_hero_banner_display', //use it as condition
        'label'       => esc_html__('Enable Hero Banner', 'woodpress'),
        'section'     => 'woodpress_homepage_id',
        'default'     => 'on',
        'priority'    => 10,
        'choices'     => [
            'on'  => esc_html__('Display', 'woodpress'),
            'off' => esc_html__('Hide', 'woodpress'),
        ],
    ]);


    Kirki::add_field(WOODPRESS_CUSROMIZER_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'woodpress_hero_banner_text',
        'label'    => esc_html__('Top Baner Hero Text', 'woodpress'),
        'section'  => 'woodpress_homepage_id',
        'default'  => esc_html__('FRUIT FRESH', 'woodpress'),
        'priority' => 10,



        'active_callback' => [
            [
                'setting'=>'woodpress_hero_banner_display',
                'operator' =>'==',
                'value'=> true,
            ]
        ]
    ]);


    Kirki::add_field(WOODPRESS_CUSROMIZER_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'woodpress_hero_main_text',
        'label'    => esc_html__('Top Baner Hero Text', 'woodpress'),
        'section'  => 'woodpress_homepage_id',
        'default'  => esc_html__('Vegetable', 'woodpress'),
        'priority' => 10,
        
        

        'active_callback' => [
            [
                'setting'=>'woodpress_hero_banner_display',
                'operator' =>'==',
                'value'=> true,
            ]
        ]
    ]);

    Kirki::add_field(WOODPRESS_CUSROMIZER_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'woodpress_hero_main_text_2',
        'label'    => esc_html__('Top Baner Hero Text', 'woodpress'),
        'section'  => 'woodpress_homepage_id',
        'default'  => esc_html__('100% Organic', 'woodpress'),
        'priority' => 10,
        
        

        'active_callback' => [
            [
                'setting'=>'woodpress_hero_banner_display',
                'operator' =>'==',
                'value'=> true,
            ]
        ]
    ]);

    Kirki::add_field(WOODPRESS_CUSROMIZER_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'woodpress_hero_bottom_text',
        'label'    => esc_html__('Top Baner Hero Bottom Text', 'woodpress'),
        'section'  => 'woodpress_homepage_id',
        'default'  => esc_html__('Free Pickup and Delivery Available', 'woodpress'),
        'priority' => 10,
        
        

        'active_callback' => [
            [
                'setting'=>'woodpress_hero_banner_display',
                'operator' =>'==',
                'value'=> true,
            ]
        ]
    ]);


    Kirki::add_field(WOODPRESS_CUSROMIZER_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'woodpress_hero_button_text',
        'label'    => esc_html__('Top Baner Hero Button Text', 'woodpress'),
        'section'  => 'woodpress_homepage_id',
        'default'  => esc_html__('SHOP NOW', 'woodpress'),
        'priority' => 10,
        
        

        'active_callback' => [
            [
                'setting'=>'woodpress_hero_banner_display',
                'operator' =>'==',
                'value'=> true,
            ]
        ]
    ]);

    Kirki::add_field('WOODPRESS_CUSROMIZER_CONFIG_ID', [
        'type'     => 'link',
        'settings' => 'woodpress_link_setting',
        'label'    => __('Link', 'woodpress'),
        'section'  => 'woodpress_homepage_id',
        'default'  => '#',
        'priority' => 10,
        
        

        'active_callback' => [
            [
                'setting'=>'woodpress_hero_banner_display',
                'operator' =>'==',
                'value'=> true,
            ]
        ]
    ]);



    Kirki::add_field(WOODPRESS_CUSROMIZER_CONFIG_ID, [
        'type'        => 'image',
        'settings'    => 'woodpress_hero_image_setting_url',
        'label'       => esc_html__('Hero banner Image', 'woodpress'),
        'description' => esc_html__('set your banner image.', 'woodpress'),
        'section'     => 'woodpress_homepage_id',
        'default'     => '',
        
        
        'active_callback' => [
            [
                'setting'=>'woodpress_hero_banner_display',
                'operator' =>'==',
                'value'=> true,
            ]
        ]
    ]);


    /**
     * >>>>> end
     */


    



}
