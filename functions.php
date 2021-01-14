<?php
/**
 * PROACT2021 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package proact2021
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'proact2021_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function proact2021_setup() {
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
				'page_menu' => esc_html__( 'Primary', 'proact2021' ),
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
				'proact2021_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'proact2021_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function proact2021_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'proact2021_content_width', 640 );
}
add_action( 'after_setup_theme', 'proact2021_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function proact2021_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'proact2021' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'This widget area is the sidebar of pages and posts.', 'proact2021' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Left', 'proact2021' ),
			'id'            => 'footer-left',
			'description'   => esc_html__( 'This widget area is the left (on desktop) text section of the footer.', 'proact2021' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s text-white">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title font-serif font-semibold text-lg uppercase mb-1">',
			'after_title'   => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Right', 'proact2021' ),
			'id'            => 'footer-right',
			'description'   => esc_html__( 'This widget area is the right (on desktop) text section of the footer.', 'proact2021' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s text-white">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title font-serif font-semibold text-lg uppercase mb-1">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'proact2021_widgets_init' );

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
 * Load our styles and scripts.
 */
function proact2021_theme_files() {
	wp_enqueue_style( 'sans-font', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' ); // phpcs:ignore
	// wp_enqueue_style( 'serif-font', '//cloud.typography.com/6507934/6212592/css/fonts.css' ); // phpcs:ignore
	wp_enqueue_style( 'serif-font', '//cloud.typography.com/6507934/7500552/css/fonts.css' ); // phpcs:ignore

	$mix_data  = file_get_contents( get_template_directory() . '/mix-manifest.json' );
	$css_files = json_decode( $mix_data, true );

	foreach ( $css_files as $key => $value ) {
		wp_enqueue_style( 'proact2021-style', get_theme_file_uri( $value ) ); // phpcs:ignore
	}

	wp_enqueue_script( 'alpine-js', '//cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js' ); // phpcs:ignore
}
add_action( 'wp_enqueue_scripts', 'proact2021_theme_files' );

/**
 * Add default styles to the body tag.
 */
add_filter(
	'body_class',
	function ( $classes ) {
		return array_merge( $classes, array( 'font-sans bg-gray-light text-gray-darkest' ) );
	}
);

/**
 * The navigation menu for the specific site.
 *
 * @param string  $theme_location The location of the menu.
 * @param boolean $mobile If the menu is mobile or not.
 * @param integer $menu_id The id of the menu to be displayed.
 */
function site_navigation_menu( $theme_location, $mobile = null ) {
	$locations = get_nav_menu_locations();

	if ( ( $theme_location ) && isset( $locations[ $theme_location ] ) ) {
		$menu       = get_term( $locations[ $theme_location ], 'nav_menu' );
		$menu_items = wp_get_nav_menu_items( $menu->term_id );

		$menu_list = "\t\t" . '<div class="nav-site flex flex-col lg:flex-row lg:items-center">' . "\n";

		$count   = 0;
		$submenu = false;
		$cpi     = get_the_id();

		foreach ( $menu_items as $current ) {

			if ( $cpi === $current->object_id ) {
				if ( ! $current->menu_item_parent ) {
					$cpi = $current->ID;
				} else {
					$current_page = $current->menu_item_parent;
				}
				$cai = $current->ID;
				break;
			}
		}

		if ( $menu_items ) {
			foreach ( $menu_items as $menu_item ) {

				$link  = $menu_item->url;
				$title = $menu_item->title;

				$display_css_class = '';

				if ( ! $menu_item->menu_item_parent ) {
					$parent_id = $menu_item->ID;

					if ( $parent_id === $cai ) {
						$selected_class = ' selected';
					} else {
						$selected_class = '';
					}

					if ( ! empty( $menu_items[ $count + 1 ] ) && intval( intval( $menu_items[ $count + 1 ]->menu_item_parent ) ) === $parent_id ) {
						$top_title = $title;
						$top_link  = $link;

						if ( $mobile ) {
							$menu_list .= "\t\t\t" . '<div class="nav-item-container" x-data="{ open: false }">' . "\n";
							$menu_list .= "\t\t\t\t" . '<a href="' . $link . '" class="nav-site-parent text-white border-b border-blue-secondary py-3 px-3 flex w-full items-center justify-between  ' . $selected_class . '" x-on:click.prevent="open = !open">' . "\n";
						} else {
							$menu_list .= "\t\t\t" . '<div class="nav-item-container mt-4 relative" x-data="{ open: false }" x-on:mouseenter="open = true" x-on:mouseleave="open = false" ">' . "\n";
							$menu_list .= "\t\t\t\t" . '<a href="' . $link . '" class="nav-site-parent lg:border-b-0 lg:text-gray-darkest lg:uppercase lg:text-lg lg:px-2 lg:flex items-center ' . $selected_class . '" :class="{ \'active\' : open }">' . "\n";
						}

						$menu_list .= "\t<span class=\"mr-1\">" . $title . "</span>\n";
						$menu_list .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="hidden lg:flex h-4 w-4 fill-current"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>';

						// down mobile caret.
						$menu_list .= '<svg x-show="open" class="lg:hidden h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>';

						// left mobile caret.
						$menu_list .= '<svg x-show="!open" class="lg:hidden h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>';

						$menu_list .= "\n\t\t\t\t" . '</a>' . "\n";
					} elseif ( empty( $menu_items[ $count + 1 ] ) || intval( $menu_items[ $count + 1 ]->menu_item_parent ) !== $parent_id ) {
						// TOP LEVEL LINK FOR NON DROPDOWNS.
						$menu_list .= "\t\t\t" . '<div class="nav-item-container">' . "\n";
						$menu_list .= "\t\t\t\t" . '<a  href="' . $link . '" class="nav-site-parent text-white border-b border-blue-secondary py-3 px-3 block lg:border-b-0 lg:text-gray-darkest lg:hover:text-blue-primary lg:uppercase lg:text-lg' . $selected_class . '">' . "<span>" . esc_html( $title ) . "</span></a>\n";
					}
				}

				if ( intval( $parent_id ) === intval( $menu_item->menu_item_parent ) ) {
					if ( ! $submenu ) {
						$submenu = true;

						if ( $mobile ) {
							$menu_list .= "\t\t\t\t" . '<div x-show="open" class="nav-site-dropdown-container bg-blue-secondary" x-cloak>' . "\n";
							$menu_list .= "\t\t\t\t" . '<a href="' . $top_link . '" class="nav-site-dropdown-item block text-white px-4 py-3">' . $top_title . '</a>' . "\n";
						} else {
							$menu_list .= "\t\t\t\t" . '<div class="py-2 bg-transparent"><div x-show="open" class="nav-site-dropdown-container absolute shadow right-0 w-64 bg-blue-primary border-b-4 border-blue-secondary" x-cloak x-transition:enter="transition-all ease-out duration-100" x-transition:enter-start="transform -translate-y-4" x-transition:enter-end="transform translate-y-0" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 translate-y-0" x-transition:leave-end="transform  opacity-0 -translate-y-4">' . "\n";
						}
					}

					$menu_list .= "\t\t\t\t\t" . '<a href="' . $link . '" class="nav-site-dropdown-item block text-white py-3 px-4 lg:bg-blue-primary hover:bg-green">' . $title . '</a>' . "\n";

					// end of dropdown block.
					// the next sub item in the list is a sub sub item with this one as it' sparent, so is failing.
					if ( empty( $menu_items[ $count + 1 ] ) || intval( $menu_items[ $count + 1 ]->menu_item_parent ) !== $parent_id && $submenu && intval( $menu_items[ $count + 1 ]->menu_item_parent ) !== $menu_item->ID ) {
						if ( ! $mobile ) {
							$menu_list .= "\t\t\t\t" . '</div>' . "\n";
						}
						$menu_list .= "\t\t\t\t" . '</div>' . "\n";

						$submenu = false;
					}
				}

				// // end of top level menu items.
				if ( empty( $menu_items[ $count + 1 ] ) || intval( $menu_items[ $count + 1 ]->menu_item_parent ) !== $parent_id && intval( $menu_items[ $count + 1 ]->menu_item_parent ) !== $menu_item->ID ) {
					$menu_list .= "\t\t\t" . '</div>' . "\n";

					$submenu = false;
				}

				$count++;
			}
		}

		$menu_list .= '</div>' . "\n";
	} else {
		$menu_list = '<!-- no menu defined in location -->';
	}
	echo $menu_list;
}

/**
 * Limit the depth of drop downs in the Dashboard
 *
 * @param string $hook The hook called by WordPress
 */
function proact2021_limit_depth( $hook ) {
	if ( 'nav-menus.php' !== $hook ) {
		return;
	}
	wp_add_inline_script( 'nav-menu', 'wpNavMenu.options.globalMaxDepth = 1;', 'after' );
}
add_action( 'admin_enqueue_scripts', 'proact2021_limit_depth' );
