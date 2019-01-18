<?php
/**
 * LLAL functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LLAL
 */


if ( ! function_exists( 'llal_setup' ) ) :
	function llal_setup() {
	    register_nav_menus( array(
			'header-menu' => esc_html__( 'Header Menu', 'llal' )
		) );
		load_theme_textdomain( 'llal', get_template_directory() . '/languages' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'small', 750, 750 );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif;

add_action( 'after_setup_theme', 'llal_setup' );

function your_theme_new_customizer_settings($wp_customize) {
    $wp_customize->add_setting('negative_logo');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'negative_logo',
    array(
    'label' => 'Logo (Versão Negative)',
    'section' => 'title_tagline',
    'settings' => 'negative_logo',
    'priority' => 1,
    ) ) );
}
add_action('customize_register', 'your_theme_new_customizer_settings');

function llal_scripts() {
    wp_enqueue_style('owl', get_template_directory_uri() . '/css/owl.carousel.min.css');
    wp_enqueue_style('owl_theme', get_template_directory_uri() . '/css/owl.theme.default.min.css');
	wp_enqueue_style('urbana', 'https://use.typekit.net/rtc5csn.css');
	wp_enqueue_style('theme_style', get_template_directory_uri() . '/css/style.css');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/fontawesome.css');
	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), $ver = false, false );
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array(), $ver = false, false );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery', 'popper'), $ver = false, false );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), $ver = false, false );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery', 'bootstrap'), $ver = false, true );
}

add_filter('tiny_mce_before_init', 'ag_tinymce_paste_as_text');

function ag_tinymce_paste_as_text( $init ) {
	$init['paste_as_text'] = true;
	return $init;
}

function custom_editor_styles() {
    add_editor_style( 'https://use.typekit.net/rtc5csn.css');
    add_editor_style( '/css/editor.css');
}
add_action( 'admin_init', 'custom_editor_styles' );

add_action( 'wp_enqueue_scripts', 'llal_scripts' );

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Geral',
		'menu_title'	=> 'Geral',
		'menu_slug' 	=> 'global-content'
	));

}

add_filter('admin_init', 'register_maintenance_option');

function register_maintenance_option()
{
    register_setting('general', 'maintenance', 'esc_attr');
    add_settings_field('maintenance', '<label for="maintenance">'.__('Em manutenção' , 'maintenance' ).'</label>' , 'maintenance_option_html', 'general');
}

function maintenance_option_html()
{ ?>
    <input type="checkbox" id="maintenance" name="maintenance" value="1" <?php checked(1, get_option('maintenance'), true) ?> />
  <?php
}


$dev_role_set = array(
    'switch_themes' => 1,
    'edit_themes' => 1,
    'activate_plugins' => 1,
    'edit_plugins' => 1,
    'edit_users' => 1,
    'edit_files' => 1,
    'manage_options' => 1,
    'moderate_comments' => 1,
    'manage_categories' => 1,
    'manage_links' => 1,
    'upload_files' => 1,
    'import' => 1,
    'unfiltered_html' => 1,
    'edit_posts' => 1,
    'edit_others_posts' => 1,
    'edit_published_posts' => 1,
    'publish_posts' => 1,
    'edit_pages' => 1,
    'read' => 1,
    'level_10' => 1,
    'level_9' => 1,
    'level_8' => 1,
    'level_7' => 1,
    'level_6' => 1,
    'level_5' => 1,
    'level_4' => 1,
    'level_3' => 1,
    'level_2' => 1,
    'level_1' => 1,
    'level_0' => 1,
    'edit_others_pages' => 1,
    'edit_published_pages' => 1,
    'publish_pages' => 1,
    'delete_pages' => 1,
    'delete_others_pages' => 1,
    'delete_published_pages' => 1,
    'delete_posts' => 1,
    'delete_others_posts' => 1,
    'delete_published_posts' => 1,
    'delete_private_posts' => 1,
    'edit_private_posts' => 1,
    'read_private_posts' => 1,
    'delete_private_pages' => 1,
    'edit_private_pages' => 1,
    'read_private_pages' => 1,
    'delete_users' => 1,
    'create_users' => 1,
    'unfiltered_upload' => 1,
    'edit_dashboard' => 1,
    'update_plugins' => 1,
    'delete_plugins' => 1,
    'install_plugins' => 1,
    'update_themes' => 1,
    'install_themes' => 1,
    'update_core' => 1,
    'list_users' => 1,
    'remove_users' => 1,
    'promote_users' => 1,
    'edit_theme_options' => 1,
    'delete_themes' => 1,
    'export' => 1,
    'copy_posts' => 1,
    'edit_blocks' => 1,
    'edit_others_blocks' => 1,
    'publish_blocks' => 1,
    'read_private_blocks' => 1,
    'read_blocks' => 1,
    'delete_blocks' => 1,
    'delete_private_blocks' => 1,
    'delete_published_blocks' => 1,
    'delete_others_blocks' => 1,
    'edit_private_blocks' => 1,
    'edit_published_blocks' => 1,
    'create_blocks' => 1,
    'wpseo_manage_options' => 1,
    'ljmm_control' => 1,
    'ljmm_view_site' => 1,
);

add_role('developer', __( 'Developer' ), $dev_role_set );
