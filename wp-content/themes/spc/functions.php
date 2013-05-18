<?php

function theme_init_theme() {
	# Enqueue jQuery
	wp_enqueue_script('jquery');
	
	# Enqueue Custom Scripts & Styles
	if (!is_admin()) {
	}
}

add_action('init', 'theme_init_theme');

add_action('after_setup_theme', 'theme_setup_theme');

# To override theme setup process in a child theme, add your own theme_setup_theme() to your child theme's
# functions.php file.
if ( ! function_exists( 'theme_setup_theme' ) ):
function theme_setup_theme() {
	include_once('lib/common.php');

	# Theme supports
	add_theme_support('automatic-feed-links');
	add_theme_support('menus');
	add_theme_support('post-thumbnails');
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'video', 'audio'));

	# Custom image sizes
	add_image_size('thumbnail', 150, 150, true);

	# Register CPTs
	include_once('options/post-types.php');
	
	# Attach custom widgets
	include_once('lib/custom-widgets/widgets.php');
	include_once('options/widgets.php');
	
	# Add Actions
	add_action('widgets_init', 'theme_widgets_init');
	add_action('wp_loaded', 'attach_theme_options');

    # Excerpts
	function new_excerpt_more($more) {
        global $post;
        return get_the_excerpt().'<br /><br /><a class="moretag" href="'. get_permalink($post->ID) . '"> Read More</a>';
    }

    add_filter('the_excerpt', 'new_excerpt_more');
}

endif;

# Register Sidebars
# Note: In a child theme with custom theme_setup_theme() this function is not hooked to widgets_init
function theme_widgets_init() {
	register_sidebar(array(
		'name' => 'Post Sidebar',
		'id' => 'post-sidebar',
		'before_widget' => '<div id="%1$s" class="bottom_widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => 'Page Sidebar',
		'id' => 'page-sidebar',
		'before_widget' => '<div id="%1$s" class="widget col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
    register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'default-sidebar',
		'before_widget' => '<div id="%1$s" class="widget col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
}

function attach_theme_options() {
    # Common Functions
	include_once('lib/common.php');
	
	# Attach Custom Fields
	include_once('lib/carbon-fields/carbon-fields.php');
	include_once('options/custom-fields.php');

	# Attach theme options
	include_once('options/theme-options.php');
	
	# Theme Help needs to be after options/theme-options.php
	include_once('lib/theme-help/theme-readme.php');

	# Include shortcodes
	include_once('options/shortcodes.php');
}

function share_icons($link, $title) {
	?>
	<div class="social-icons">
		<a href="http://twitter.com/home?status= <?php echo $link; ?>" class="tw" target="_blank"></a>
		<a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode($link); ?>&amp;t=<?php echo $title; ?>" target="blank" class="fb"></a>
		<div class="cl">&nbsp;</div>
	</div>
	<?php
}

function blog_title() {
	$id = get_option('page_for_posts');
	if ($id) {
		$title = get_the_title($id);
		echo $title;
    } else {
        bloginfo('name');
    }
}
?>
