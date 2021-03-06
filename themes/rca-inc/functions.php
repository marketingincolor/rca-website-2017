<?php
/**
 * RCA Inc. functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RCA_Inc.
 */

if ( ! function_exists( 'rca_inc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rca_inc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on RCA Inc., use a find and replace
		 * to change 'rca-inc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rca-inc', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'rca-inc' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'rca_inc_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'rca_inc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rca_inc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rca_inc_content_width', 640 );
}
add_action( 'after_setup_theme', 'rca_inc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rca_inc_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rca-inc' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rca-inc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rca_inc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rca_inc_scripts() {
	wp_enqueue_style( 'rca-inc-style', get_stylesheet_uri() );
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.css');
	wp_enqueue_script( 'top-slider', get_stylesheet_directory_uri() . '/js/top-slider.js' );
	wp_enqueue_script( 'rca-inc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'rca-inc-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rca_inc_scripts' );

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


/* ------------------------------------------------------------------------ *
 * Theme Options - Add Menu
 * ------------------------------------------------------------------------ */
function rca_theme_menu()
{
	//add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function );
 	add_theme_page( 'Theme Option', 'Theme Options', 'manage_options', 'rca-theme-options', 'rca_theme_page');  
}
add_action('admin_menu', 'rca_theme_menu');

/* ------------------------------------------------------------------------ *
 * Theme Options - Add Content to Theme Options Page
 * ------------------------------------------------------------------------ */
function rca_theme_page()
{

echo '<div class="wrap">
		<div id="icon-options-general" class="icon32"></div>
			<h1>RCA: Theme Options</h1>
			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-1">
				<div id="post-body-content">
					<div class="meta-box-sortables ui-sortable">
						<div class="postbox">
							<div class="inside">
								<div class="section-panel">
									<h1></h1>
									<form method="post" enctype="multipart/form-data" action="options.php">';
									settings_fields('rca_theme_options'); 
									do_settings_sections('rca_theme_options.php');
									echo '<p class="submit">
									<input type="submit" class="button-primary" value="Save Changes" />
									</p>
									</form>
								</div>
								<p></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> ';

}
       
/* ------------------------------------------------------------------------ *
 * Theme Options - Register Settings
 * ------------------------------------------------------------------------ */

function rca_register_settings()
{
    // Register the settings with Validation callback
    register_setting( 'rca_theme_options', 'rca_theme_options', 'rca_validate_settings' );

    // Add settings section
    add_settings_section( 'rca_text_section', '', 'rca_display_section', 'rca_theme_options.php' );

    //Facebook Link Args
    $fb_args = array(
      'type'      => 'text',
      'id'        => 'rca_fb_textbox',
      'name'      => 'rca_fb_textbox',
      'desc'      => '',
      'std'       => '',
      'label_for' => 'rca_fb_textbox',
      'class'     => 'css_class'
    );

    $twitter_args = array(
      'type'      => 'text',
      'id'        => 'rca_twitter_textbox',
      'name'      => 'rca_twitter_textbox',
      'desc'      => '',
      'std'       => '',
      'label_for' => 'rca_twitter_textbox',
      'class'     => 'css_class'
    );

    $youtube_args = array(
      'type'      => 'text',
      'id'        => 'rca_youtube_textbox',
      'name'      => 'rca_youtube_textbox',
      'desc'      => '',
      'std'       => '',
      'label_for' => 'rca_youtube_textbox',
      'class'     => 'css_class'
    );

    $linkedin_args = array(
      'type'      => 'text',
      'id'        => 'rca_linkedin_textbox',
      'name'      => 'rca_linkedin_textbox',
      'desc'      => '',
      'std'       => '',
      'label_for' => 'rca_linkedin_textbox',
      'class'     => 'css_class'
    );

    //Facebook Link Args
    $phone_args = array(
      'type'      => 'text',
      'id'        => 'rca_phone_number',
      'name'      => 'rca_phone_number',
      'desc'      => '',
      'std'       => '',
      'label_for' => 'rca_phone_number',
      'class'     => 'css_class'
    );

    add_settings_field( 'rca_fb_link', 'Facebook Link:', 'rca_display_setting', 'rca_theme_options.php', 'rca_text_section', $fb_args );
    add_settings_field( 'rca_twitter_link', 'Twitter Link:', 'rca_display_setting', 'rca_theme_options.php', 'rca_text_section', $twitter_args );
    add_settings_field( 'rca_youtube_link', 'YouTube Link:', 'rca_display_setting', 'rca_theme_options.php', 'rca_text_section', $youtube_args );
    add_settings_field( 'rca_linkedin_link', 'LinkedIn Link:', 'rca_display_setting', 'rca_theme_options.php', 'rca_text_section', $linkedin_args );
    add_settings_field( 'rca_phone_number', 'Phone Number:', 'rca_display_setting', 'rca_theme_options.php', 'rca_text_section', $phone_args );
}
add_action( 'admin_init', 'rca_register_settings' );

/* ------------------------------------------------------------------------ *
 * Theme Options - Image Sizes
 * ------------------------------------------------------------------------ */
add_theme_support( 'post-thumbnails' );

function rca_theme_img_sizes() {
  add_image_size('banner-img', 1430, 175 );
}

add_action( 'after_setup_theme', 'rca_theme_img_sizes' );

/* ------------------------------------------------------------------------ *
 * Theme Options - Displays Theme Sections
 * ------------------------------------------------------------------------ */
function rca_display_section($section){ 

}

/* ------------------------------------------------------------------------ *
 * Theme Options - Display Settings
 * ------------------------------------------------------------------------ */
function rca_display_setting($args)
{
    extract( $args );

    $option_name = 'rca_theme_options';

    $options = get_option( $option_name );

    switch ( $type ) {  
          case 'text':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break;  
    }
}

/* ------------------------------------------------------------------------ *
 * Theme Options - Validate Settings
 * ------------------------------------------------------------------------ */
function rca_validate_settings($input)
{
  foreach($input as $k => $v)
  {
    $newinput[$k] = trim($v);
    
    // Check the input is a letter or a number
    // if(!preg_match('/^[A-Z0-9 _]*$/i', $v)) {
    //   $newinput[$k] = '';
    // }
  }

  return $newinput;
}

/* ------------------------------------------------------------------------ *
 * Menus - Footer Menu
 * ------------------------------------------------------------------------ */
register_nav_menus( array(
  'rca_mobile_footer_menu_left' => 'Mobile Footer Menu Left',
  'rca_mobile_footer_menu_right' => 'Mobile Footer Menu Right',
  'rca_desktop_footer_menu' => 'Desktop Footer Menu'
) );


/* ------------------------------------------------------------------------ *
* Carousel - Top
* ------------------------------------------------------------------------ */
/**
 * Slider on top of home page
 * @param  [type] $atts    [description]
 * @param  [type] $content [description]
 * @return [type]          [description]
 */

function rca_top_slider($atts, $content = null) {
    extract(shortcode_atts(array(
        'category' => 'Uncategoryzed'
                    ), $atts));

    $data_attr = "";
    foreach ($atts as $key => $value) {
        if ($key != "category") {
            $data_attr .= ' data-' . $key . '="' . $value . '" ';
        }
    }

    $lazyLoad = array_key_exists("lazyload", $atts) && $atts["lazyload"] == true;

    $args = array(
        'post_type' => 'owl-carousel',
        'orderby' => get_option('owl_carousel_orderby', 'post_date'),
        'order' => 'asc',
        'tax_query' => array(
            array(
                'taxonomy' => 'Carousel',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        ),
        'nopaging' => true
    );

	$result = '<div id="owl-carousel-top-slider" class="owl-carousel owl-carousel-' . sanitize_title($atts['category']) . '" ' . $data_attr . '>';

    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();

        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), get_post_type());
        $meta_link = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_owlurl', true);

        $result .= '<div class="item">';
        if ($img_src[0]) {
            $result .= '<div>';
            if (!empty($meta_link)) {
                $result .= '<a href="' . $meta_link . '">';
            }
            if ($lazyLoad) {
                $result .= '<img class="lazyOwl" title="' . get_the_title() . '" data-src="' . $img_src[0] . '" alt="' . get_the_title() . '"/>';
            } else {
                $result .= '<img title="' . get_the_title() . '" src="' . $img_src[0] . '" alt="' . get_the_title() . '"/>';
            }
            if (!empty($meta_link)) {
                $result .= '</a>';
            }

            // Add image overlay with hook
            $slide_title = get_the_title();
            $slide_content = get_the_content();
            $img_overlay = '<div class="owl-carousel-item-imgoverlay">';
            $img_overlay .= '<div class="owl-carousel-item-imgtitle">' . $slide_title . '</div>';
            $img_overlay .= '<div class="owl-carousel-item-imgcontent">' . wpautop($slide_content) . '</div>';
            $img_overlay .= '</div>';
            $result .= apply_filters('owlcarousel_img_overlay', $img_overlay, $slide_title, $slide_content, $meta_link);

            $result .= '</div>';
        } else {
            $result .= '<div class="owl-carousel-item-text">' . get_the_content() . '</div>';
        }
        $result .= '</div>';
    }
    $result .= '</div>';
    
    /* Restore original Post Data */
    wp_reset_postdata();

    return $result;
}
add_shortcode('rca-top-slider', 'rca_top_slider');


/* ------------------------------------------------------------------------ *
* Carousel - News
* ------------------------------------------------------------------------ */
function rca_news_slider($atts, $content = null) {
    extract(shortcode_atts(array(
        'category' => 'Uncategoryzed'
                    ), $atts));

    $data_attr = "";
    foreach ($atts as $key => $value) {
        if ($key != "category") {
            $data_attr .= ' data-' . $key . '="' . $value . '" ';
        }
    }

    $lazyLoad = array_key_exists("lazyload", $atts) && $atts["lazyload"] == true;

    $args = array(
        'post_type' => 'owl-carousel',
        'orderby' => get_option('owl_carousel_orderby', 'post_date'),
        'order' => 'asc',
        'tax_query' => array(
            array(
                'taxonomy' => 'Carousel',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        ),
        'nopaging' => true
    );

	$result = '<div id="owl-carousel-news" class="owl-carousel owl-carousel-' . sanitize_title($atts['category']) . '" ' . $data_attr . '>';

    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();

        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), get_post_type());
        $meta_link = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_owlurl', true);

        $result .= '<div class="item">';
        if ($img_src[0]) {
            $result .= '<div>';
            if (!empty($meta_link)) {
                $result .= '<a href="' . $meta_link . '">';
            }
            if ($lazyLoad) {
                $result .= '<img class="lazyOwl" title="' . get_the_title() . '" data-src="' . $img_src[0] . '" alt="' . get_the_title() . '"/>';
            } else {
                $result .= '<img title="' . get_the_title() . '" src="' . $img_src[0] . '" alt="' . get_the_title() . '"/>';
            }
            if (!empty($meta_link)) {
                $result .= '</a>';
            }

            // Add image overlay with hook
            $slide_title = get_the_title();
            $slide_content = get_the_content();
            $img_overlay = '<div class="owl-carousel-item-imgoverlay">';
            $img_overlay .= '<div class="owl-carousel-item-imgtitle">' . $slide_title . '</div>';
            $img_overlay .= '<div class="owl-carousel-item-imgcontent">' . wpautop($slide_content) . '</div>';
            $img_overlay .= '</div>';
            $result .= apply_filters('owlcarousel_img_overlay', $img_overlay, $slide_title, $slide_content, $meta_link);

            $result .= '</div>';
        } else {
            $result .= '<div class="owl-carousel-item-text">' . get_the_content() . '</div>';
        }
        $result .= '</div>';
    }
    $result .= '</div>';
    
    /* Restore original Post Data */
    wp_reset_postdata();

    return $result;
}
add_shortcode('rca-news-slider', 'rca_news_slider');


/* ------------------------------------------------------------------------ *
* Navigation - Mobile
* ------------------------------------------------------------------------ */
class RCA_ACCORDIAN_MENU_WALKER extends Walker_Nav_Menu {


  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat( "\t", $depth );
    $output .= "\n$indent<ul class=\"menu vertical nested\">\n";
  }
}

function rca_accordian_menu_fallback( $args ) {

  $walker_page = new Walker_Page();
  $fallback    = $walker_page->walk( get_pages(), 0 );
  $fallback    = str_replace( "children", "children vertical menu nested", $fallback );
  echo '<ul class="menu accordian-menu vertical large-horizontal" data-responsive-menu="medium-dropdown" data-hide-for="large" style="width: 100%;" data-accordion-menu>' . $fallback . '</ul>';
}

// mega menu walker
class megaMenuWalker extends Walker_Nav_Menu {
    private $column_limit = 3;
    private $show_widget = false;
    private $column_count = 0;
    static $li_count = 0;
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $item_id = $item->ID;
        if ($depth == 0) {
            self::$li_count = 0;
        }
        if ($depth == 0 && in_array("widget", $classes)) {
            $this->show_widget = true;
            $this->column_count++;
        }
        if ($depth == 1 && self::$li_count == 1) {
            $this->column_count++;
        }
        if ($depth == 1 && in_array("break", $classes) && self::$li_count != 1 && $this->column_count < $this->column_limit) {
            $output .= "</ul><ul class=\"sub-menu\">";
            $this->column_count++;
        }
        $class_names = join(" ", apply_filters("nav_menu_css_class", array_filter($classes), $item)); // set up the classes array to be added as classes to each li
        $class_names = " class=\"" . esc_attr($class_names) . "\"";
        $output .= sprintf(
            "<li id=\"menu-item-%s\"%s><a href=\"%s\">%s</a>",
            $item_id,
            $class_names,
            $item->url,
            $item->title
        );
        self::$li_count++;
    }
    function start_lvl(&$output, $depth = 0, $args = array()) {
        if ($depth == 0) {
            $output .= "<section>";
        }
        $output .= "<ul class=\"sub-menu\">";
    }
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "</ul>";
        if ($depth == 0) {
            if ($this->show_widget) {
                ob_start();
                dynamic_sidebar("Navigation Callout");
                $widget = ob_get_contents();
                ob_end_clean();
                $output .= $widget;
                $this->show_widget = false;
            }
            $output .= "</section>";
        }
    }
    function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        if ($depth == 0 && $this->column_count > 0) {
            $this->column_count = 0;
        }
        $output .= "</li>";
    }
}

// add mega-menu-columns-# classes
function add_column_number($items) {
    static $column_limit = 3;
    static $post_id = 0;
    static $x_key = 0;
    static $column_count = 0;
    static $li_count = 0;
    $tmp = array();
    foreach($items as $key => $item) {
        if (0 == $item->menu_item_parent) {
            $x_key = $key;
            $post_id = $item->ID;
            $column_count = 0;
            $li_count = 0;
            if (in_array("widget", $item->classes, 1)) {
                $column_count++;
            }
        }
        if ($post_id == $item->menu_item_parent) {
            $li_count++;
            if ($column_count < $column_limit && $li_count == 1) {
                $column_count++;
            }
            if (in_array("break", $item->classes, 1) && $li_count > 1 && $column_count < $column_limit) {
                $column_count++;
            }
            $tmp[$x_key] = $column_count;
        }
    }
    foreach($tmp as $key => $value) {
        $items[$key]->classes[] = sprintf("mega-menu-columns-%d", $value);
    }
    unset($tmp);
    return $items;
};

// add the column classes
add_filter("wp_nav_menu_args", function($args) {
    if ($args["walker"] instanceof megaMenuWalker) {
        add_filter("wp_nav_menu_objects", "add_column_number");
    }
    return $args;
});

// stop the column classes function
add_filter("wp_nav_menu", function( $nav_menu ) {
    remove_filter("wp_nav_menu_objects", "add_column_number");
    return $nav_menu;
});