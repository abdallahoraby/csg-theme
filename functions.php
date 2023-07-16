<?php
/**
 * CityStoneGroup functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CityStoneGroup
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'csg_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function csg_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CityStoneGroup, use a find and replace
		 * to change 'csg' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'csg', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'csg' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'csg_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);


        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );


    }

endif;
add_action( 'after_setup_theme', 'csg_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function csg_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'csg_content_width', 640 );
}
add_action( 'after_setup_theme', 'csg_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function csg_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'csg' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'csg' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'csg_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function csg_scripts() {
	wp_enqueue_style( 'csg-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style('boostrap-min', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), rand() );
    wp_enqueue_style('mega_menu', get_stylesheet_directory_uri() . '/css/mega-menu.css', array(), rand() );
    wp_enqueue_style('html_style', get_stylesheet_directory_uri() . '/css/html_styles.css', array(), rand() );
    wp_enqueue_style('diamonds', get_stylesheet_directory_uri() . '/css/diamonds.css', array(), rand() );
    wp_enqueue_style('lightbox', get_stylesheet_directory_uri() . '/css/lightbox.css', array(), rand() );
    wp_enqueue_style('aos', get_stylesheet_directory_uri() . '/css/aos.css', array(), rand() );
    wp_enqueue_style('myStyle', get_stylesheet_directory_uri() . '/css/myStyle.css', array(), rand() );



	wp_style_add_data( 'csg-style', 'rtl', 'replace' );

	wp_enqueue_script( 'csg-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'csg-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'csg-jquery-diamonds', get_template_directory_uri() . '/js/jquery.diamonds.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'csg-lightbox', get_template_directory_uri() . '/js/lightbox.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'csg-aos', get_template_directory_uri() . '/js/aos.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'csg-myscript', get_template_directory_uri() . '/js/myScripts.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'csg_scripts' );

/**
 * Enqueue Admin scripts and styles.
 */

function csg_admin_scripts(){
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-widget');
    wp_enqueue_script('jquery-ui-sortable');

    if ( ! did_action( 'wp_enqueue_media' ) )
        wp_enqueue_media();

    wp_enqueue_style('admin-style', get_stylesheet_directory_uri() . '/css/admin-style.css', array(), rand() );
    wp_enqueue_script( 'admin-script', get_template_directory_uri() . '/js/admin-script.js', array(), _S_VERSION, true );
}

add_action('admin_enqueue_scripts', 'csg_admin_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * CPT include.
 */
require get_template_directory() . '/inc/class-cpt.php';

/**
 * Custom Metaboxes .
 */
require get_template_directory() . '/inc/class-custom-metabox.php';



/**
 * Load TGM support
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'hostarling_tgm_install_plugins' );

function hostarling_tgm_install_plugins() {


    /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
    $plugins = array(

        // This is an example of how to include a plugin bundled with a theme.
        array(
            'name'               => 'Classic Editor', // The plugin name.
            'slug'               => 'tgm-classic-editor-plugin', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/lib/plugins/classic-editor.1.6.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name'               => 'Redux Framework', // The plugin name.
            'slug'               => 'tgm-redux-plugin', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/lib/plugins/redux-framework.4.1.26.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name'               => 'WOOF - WooCommerce Products Filter', // The plugin name.
            'slug'               => 'tgm-woof-plugin', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/lib/plugins/woocommerce-products-filter.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name'     => 'Woocommerce',
            'slug'     => 'woocommerce',
            'required' => true,
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        array(
            'name'     => 'Social LikeBox & Feed',
            'slug'     => 'facebook-by-weblizar',
            'required' => true,
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        array(
            'name'     => 'Font Awesome',
            'slug'     => 'font-awesome',
            'required' => true,
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        array(
            'name'               => 'WPC Smart Quick View 2.6.2', // The plugin name.
            'slug'               => 'woo-smart-quick-view', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/lib/plugins/woo-smart-quick-view.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name'     => 'jQuery Updater',
            'slug'     => 'jquery-updater',
            'required' => true,
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),


    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );

}



/********
 * theme activation and deactivation
 *******/

add_action('after_switch_theme', 'setup_theme_options');

function setup_theme_options () {

    $pages = array(
        'home' => 'Home',
        'factory' => 'Factory',
        'about-us' => 'About Us',
        'contact-us' => 'Contact Us'
    );

    foreach ($pages as $key => $value):
        $page_to_create = array();
        $page_to_create['post_title'] = $value;
        $page_to_create['post_content'] = "";
        $page_to_create['post_status'] = "publish";
        $page_to_create['post_name'] = $key;
        $page_to_create['post_type'] = "page";

        if( !get_page_by_path( $key , OBJECT ) ){
            $page_id = wp_insert_post( $page_to_create );
            // set home page as front-page
            if( $key === 'home' ):
                update_option( 'page_on_front', $page_id );
                update_option( 'show_on_front', 'page' );
            endif;
            wp_reset_postdata ();
        }
    endforeach;



}


/**
 * Load Redux Framework Config
 */
require_once dirname( __FILE__ ) . '/inc/redux-options/hostarling-config.php';

