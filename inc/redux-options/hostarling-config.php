<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

if ( ! class_exists( 'Redux' ) ) {
	return null;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'csg';

/**
 * GLOBAL ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: @link https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 */

/**
 * ---> BEGIN ARGUMENTS
 */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	// REQUIRED!!  Change these values as you need/desire.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	'menu_title'                => esc_html__( 'CityStone Theme Options', 'csg' ),
	'page_title'                => esc_html__( 'CityStone Theme Options', 'csg' ),

	// Use a asynchronous font on the front end or font string.
	'async_typography'          => true,

	// Disable this in case you want to create your own google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Choose an icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Choose an priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Set a different name for your global variable other than the opt_name.
	'global_variable'           => '',

	// Show the time the page took to load, etc.
	'dev_mode'                  => false,

	// Enable basic customizer support.
	'customizer'                => true,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => null,

	// For a full list of options, visit: @link http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel.
	'page_slug'                 => '_options',

	// On load save the defaults to DB before user clicks save or not.
	'save_defaults'             => true,

	// If true, shows the default value next to each field that is not the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default. Suggested: *.
	'default_mark'              => '',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// CAREFUL -> These options are for advanced use only.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head.
	'output_tag'                => true,

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',

	// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
	'use_cdn'                   => true,
	'compiler'                  => true,

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'light',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),
);

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
$args['admin_bar_links'][] = array(
	'id'    => 'redux-docs',
	'href'  => '//devs.redux.io/',
	'title' => esc_html__( 'Documentation', 'csg' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-support',
	'href'  => '//github.com/ReduxFramework/redux-framework/issues',
	'title' => esc_html__( 'Support', 'csg' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-extensions',
	'href'  => 'redux.io/extensions',
	'title' => esc_html__( 'Extensions', 'csg' ),
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
	'url'   => '//github.com/ReduxFramework/ReduxFramework',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
	'url'   => '//www.facebook.com/pages/Redux-Framework/243141545850368',
	'title' => esc_html__( 'Like us on Facebook', 'csg' ),
	'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
	'url'   => '//twitter.com/reduxframework',
	'title' => esc_html__( 'Follow us on Twitter', 'csg' ),
	'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
	'url'   => '//www.linkedin.com/company/redux-framework',
	'title' => esc_html__( 'FInd us on LinkedIn', 'csg' ),
	'icon'  => 'el el-linkedin',
);

// Panel Intro text -> before the form.
if ( ! isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}
	$args['intro_text'] = '<p>' . sprintf( __( 'Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: $s', 'csg' ) . '</p>', '<strong>' . $v . '</strong>' );
} else {
	$args['intro_text'] = '<p>' . esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'csg' ) . '</p>';
}

// Add content after the form.
$args['footer_text'] = '<p>' . esc_html__( 'This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'csg' ) . '</p>';

Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> BEGIN HELP TABS
 */

$help_tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__( 'Theme Information 1', 'csg' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'csg' ) . '</p>',
	),

	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__( 'Theme Information 2', 'csg' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'csg' ) . '</p>',
	),
);

Redux::set_help_tab( $opt_name, $help_tabs );

// Set the help sidebar.
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'csg' ) . '</p>';
Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

/*
 *
 * ---> BEGIN SECTIONS
 *
 */

/* As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for. */

/* -> START Basic Fields. */

$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
);

$section = array(
	'title'  => esc_html__( 'Hero Section', 'csg' ),
	'id'     => 'basic',
	'desc'   => esc_html__( 'Home section settings.', 'csg' ),
	'icon'   => 'el el-home',
	'fields' => array(

	),
);

Redux::set_section( $opt_name, $section );

$section = array(
	'title' => __( 'General Settings', 'csg' ),
	'id'    => 'basic',
	'desc'  => __( 'Logo and Home Section.', 'csg' ),
	'icon'  => 'el el-home',
);

// General section
Redux::set_section( $opt_name, $section );

$section = array(
    'title'      => esc_html__( 'General Settings', 'csg' ),
    'desc'       => esc_html__( 'Set General settings: ', 'csg' ) ,
    'id'         => 'general-section',
    'subsection' => true,
    'fields'     => array(

        array(
            'id' => 'primary_color',
            'type' => 'color',
            'title' => __( 'Primary Color' , 'redux_docs_generator' ),
            'validate' => array(
                'color'
            )
        )

    ),
);

// header section
Redux::set_section( $opt_name, $section );

$section = array(
	'title'      => esc_html__( 'Header', 'csg' ),
	'desc'       => esc_html__( 'Set Header settings: ', 'csg' ) ,
	'id'         => 'header-section',
	'subsection' => true,
	'fields'     => array(
        array(
            'id' => 'site_logo',
            'type' => 'media',
            'title' => __( 'Site Logo' , 'csg' )
        ),
		array(
			'id' => 'logo_big_title',
			'type' => 'text',
			'title' => __( 'Logo Big Title' , 'redux_docs_generator' )
		),
        array(
            'id' => 'logo_sub_title',
            'type' => 'text',
            'title' => __( 'Logo Sub Title' , 'redux_docs_generator' )
        ),
        array(
            'id' => 'logo_sub_title_small',
            'type' => 'text',
            'title' => __( 'Logo Sub Title Small' , 'redux_docs_generator' )
        ),
        array(
            'id' => 'body_bg_image',
            'type' => 'media',
            'title' => __( 'Body Background Image' , 'csg' )
        ),
		array(
			'id' => 'items_per_column',
			'type' => 'text',
			'title' => __( 'Megamenu items per column (default 5 )' , 'redux_docs_generator' ),
            'validate' => array(
                'numeric'
            )
		),
		array(
			'id' => 'home_social_facebook',
			'type' => 'text',
			'title' => __( 'Facebook Url' , 'redux_docs_generator' ),
			'validate' => array(
				'url'
			)
		),
		array(
			'id' => 'home_social_youtube',
			'type' => 'text',
			'title' => __( 'Youtube Url' , 'redux_docs_generator' ),
			'validate' => array(
				'url'
			)
		),
		array(
			'id' => 'home_social_twitter',
			'type' => 'text',
			'title' => __( 'Twitter Url' , 'redux_docs_generator' ),
			'validate' => array(
				'url'
			)
		),
		array(
			'id' => 'home_social_instagram',
			'type' => 'text',
			'title' => __( 'Instagram Url' , 'redux_docs_generator' ),
			'validate' => array(
				'url'
			)
		),

	),
);

// home page section

Redux::set_section( $opt_name, $section );

$section = array(
    'title'      => esc_html__( 'Home Page', 'csg' ),
    'desc'       => esc_html__( 'Set Home Page settings: ', 'csg' ) ,
    'id'         => 'home-section',
    'subsection' => true,
    'fields'     => array(
        array(
            'id' => 'cat_one_title',
            'type' => 'text',
            'title' => __( '1st Category Title' , 'redux_docs_generator' )
        ),
        array(
            'id' => 'cat_one_link',
            'type' => 'text',
            'title' => __( '1st Category Url' , 'redux_docs_generator' ),
            'validate' => array(
                'url'
            )
        ),
        array(
            'id' => 'cat_one_image',
            'type' => 'media',
            'title' => __( '1st Category Image' , 'csg' )
        ),
        array(
            'id' => 'cat_two_title',
            'type' => 'text',
            'title' => __( '2nd Category Title' , 'redux_docs_generator' )
        ),
        array(
            'id' => 'cat_two_link',
            'type' => 'text',
            'title' => __( '2nd Category Url' , 'redux_docs_generator' ),
            'validate' => array(
                'url'
            )
        ),
        array(
            'id' => 'cat_two_image',
            'type' => 'media',
            'title' => __( '2nd Category Image' , 'csg' )
        ),
        array(
            'id' => 'cat_three_title',
            'type' => 'text',
            'title' => __( '3rd Category Title' , 'redux_docs_generator' )
        ),
        array(
            'id' => 'cat_three_link',
            'type' => 'text',
            'title' => __( '3rd Category Url' , 'redux_docs_generator' ),
            'validate' => array(
                'url'
            )
        ),
        array(
            'id' => 'cat_three_image',
            'type' => 'media',
            'title' => __( '3rd Category Image' , 'csg' )
        ),
        array(
            'id' => 'cat_four_title',
            'type' => 'text',
            'title' => __( '4th Category Title' , 'redux_docs_generator' )
        ),
        array(
            'id' => 'cat_four_link',
            'type' => 'text',
            'title' => __( '4th Category Url' , 'redux_docs_generator' ),
            'validate' => array(
                'url'
            )
        ),
        array(
            'id' => 'cat_four_image',
            'type' => 'media',
            'title' => __( '4th Category Image' , 'csg' )
        ),

    ),
);



Redux::set_section( $opt_name, $section );

/*
 * <--- END SECTIONS
 */
