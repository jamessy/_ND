<?php
/**
 * ND functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ND
 */

if ( ! defined( 'ND_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ND_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nd_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
	load_theme_textdomain( 'nd', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'nd' ),
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
			'nd_custom_background_args',
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

	// Add theme support for editor styles.
	add_theme_support( 'editor-styles' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for wide and full alignments.
	add_theme_support( 'align-wide' );

	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'nd_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nd_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nd_content_width', 640 );
}
add_action( 'after_setup_theme', 'nd_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nd_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nd' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nd_widgets_init' );

/**
 * Get asset path from manifest for cache busting.
 * Falls back to original path if manifest doesn't exist.
 *
 * @param string $file_path Original path to the asset file.
 * @return string Asset path (hashed if manifest exists, original otherwise).
 */
function nd_get_asset_path( $file_path ) {
	$manifest_path = get_template_directory() . '/dist/manifest.json';
	
	if ( file_exists( $manifest_path ) ) {
		$manifest = json_decode( file_get_contents( $manifest_path ), true );
		if ( isset( $manifest[ $file_path ] ) ) {
			return $manifest[ $file_path ];
		}
	}
	
	// Fallback to original path.
	return $file_path;
}

/**
 * Get asset version for cache busting.
 * Uses file modification time.
 *
 * @param string $file_path Path to the asset file.
 * @return string Version string.
 */
function nd_get_asset_version( $file_path ) {
	$full_path = get_template_directory() . '/' . $file_path;
	if ( file_exists( $full_path ) ) {
		return filemtime( $full_path );
	}
	return ND_VERSION;
}

/**
 * Enqueue scripts and styles.
 */
function nd_scripts() {
	// Enqueue main stylesheet from dist.
	$style_path = nd_get_asset_path( 'dist/style.css' );
	$style_version = nd_get_asset_version( $style_path );
	wp_enqueue_style( 'nd-style', get_template_directory_uri() . '/' . $style_path, array(), $style_version );
	wp_style_add_data( 'nd-style', 'rtl', 'replace' );

	// Enqueue editor styles.
	$editor_style_path = nd_get_asset_path( 'dist/editor-style.css' );
	// add_editor_style expects a path relative to the theme directory.
	add_editor_style( $editor_style_path );

	// Enqueue navigation script if it exists.
	$nav_script_path = nd_get_asset_path( 'dist/js/navigation.js' );
	if ( file_exists( get_template_directory() . '/' . $nav_script_path ) ) {
		$nav_version = nd_get_asset_version( $nav_script_path );
		wp_enqueue_script( 'nd-navigation', get_template_directory_uri() . '/' . $nav_script_path, array(), $nav_version, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nd_scripts' );

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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Register block patterns.
 */
function nd_register_block_patterns() {
	$block_pattern_categories = array(
		'nd' => array(
			'label' => esc_html__( 'ND', 'nd' ),
		),
	);

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'hero',
		'content-image',
		'call-to-action',
		'multi-column-content',
		'section-hero',
		'section-standard',
		'section-two-column',
	);

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_template_directory() . '/inc/patterns/' . $block_pattern . '.php';
		if ( file_exists( $pattern_file ) ) {
			require $pattern_file;
		}
	}
}
add_action( 'init', 'nd_register_block_patterns' );

/**
 * Load Kitchen Sink content helper.
 */
require get_template_directory() . '/inc/kitchen-sink-content.php';

/**
 * Create Kitchen Sink page on theme activation.
 */
function nd_create_kitchen_sink_page() {
	$page_title = 'Kitchen Sink';
	$page_slug = 'kitchen-sink';

	// Check if page already exists.
	$page = get_page_by_path( $page_slug );
	if ( $page ) {
		return;
	}

	// Get comprehensive Kitchen Sink content.
	$content = nd_get_kitchen_sink_content();

	// Create the page.
	$page_data = array(
		'post_title'   => $page_title,
		'post_name'    => $page_slug,
		'post_content' => $content,
		'post_status'  => 'publish',
		'post_type'    => 'page',
		'post_author'  => 1,
	);

	wp_insert_post( $page_data );
}
add_action( 'after_switch_theme', 'nd_create_kitchen_sink_page' );

/**
 * Create dummy pages and menu structure for submenu demonstration.
 */
function nd_create_submenu_pages() {
	// Check if pages already exist
	$parent_page = get_page_by_path( 'livery' );
	
	if ( ! $parent_page ) {
		// Create parent "Livery" page
		$parent_id = wp_insert_post( array(
			'post_title'   => 'Livery',
			'post_name'    => 'livery',
			'post_content' => '<p>This is the Livery page. It demonstrates the submenu dropdown functionality.</p>',
			'post_status' => 'publish',
			'post_type'    => 'page',
		) );
	} else {
		$parent_id = $parent_page->ID;
	}

	// Submenu pages
	$submenu_pages = array(
		'assisted-diy-flexi-livery' => 'Assisted DIY/ Flexi Livery',
		'british-horse-society-approval-ratings' => 'British Horse Society Approval Ratings',
		'the-livery' => 'The Livery',
		'full-livery' => 'Full Livery',
		'working-livery' => 'Working Livery',
		'additional-livery-services' => 'Additional Livery Services',
		'stable-management-horse-welfare-adults' => 'Stable Management and Horse Welfare for Adults',
		'livery-yard-security' => 'Livery Yard Security',
	);

	foreach ( $submenu_pages as $slug => $title ) {
		$existing_page = get_page_by_path( $slug );
		if ( ! $existing_page ) {
			wp_insert_post( array(
				'post_title'   => $title,
				'post_name'    => $slug,
				'post_content' => '<p>This is the ' . esc_html( $title ) . ' page.</p>',
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_parent'  => $parent_id,
			) );
		}
	}

	// Create menu structure programmatically
	$menu_name = 'Primary Menu';
	$menu_exists = wp_get_nav_menu_object( $menu_name );

	if ( ! $menu_exists ) {
		$menu_id = wp_create_nav_menu( $menu_name );

		// Add Livery parent menu item
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  => 'Livery',
			'menu-item-url'    => get_permalink( $parent_id ),
			'menu-item-status' => 'publish',
			'menu-item-type'   => 'post_type',
			'menu-item-object' => 'page',
			'menu-item-object-id' => $parent_id,
		) );

		// Get the parent menu item ID
		$menu_items = wp_get_nav_menu_items( $menu_id );
		$parent_menu_item_id = 0;
		foreach ( $menu_items as $item ) {
			if ( $item->object_id == $parent_id ) {
				$parent_menu_item_id = $item->ID;
				break;
			}
		}

		// Add submenu items
		foreach ( $submenu_pages as $slug => $title ) {
			$page = get_page_by_path( $slug );
			if ( $page ) {
				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-title'     => $title,
					'menu-item-url'        => get_permalink( $page->ID ),
					'menu-item-status'    => 'publish',
					'menu-item-type'      => 'post_type',
					'menu-item-object'    => 'page',
					'menu-item-object-id' => $page->ID,
					'menu-item-parent-id' => $parent_menu_item_id,
				) );
			}
		}

		// Assign menu to location
		$locations = get_theme_mod( 'nav_menu_locations' );
		$locations['menu-1'] = $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}
}
add_action( 'after_switch_theme', 'nd_create_submenu_pages' );
