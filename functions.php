<?php
/**
 * LLAL functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LLAL
 */

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
      'priority' => 1
    ) ) );
}
add_action('customize_register', 'your_theme_new_customizer_settings');

function llal_scripts() {
    wp_enqueue_style('owl', get_template_directory_uri() . '/css/owl.carousel.min.css');
    wp_enqueue_style('owl_theme', get_template_directory_uri() . '/css/owl.theme.default.min.css');
	  wp_enqueue_style('asap', 'https://fonts.googleapis.com/css?family=Asap:400,400i,500,500i,700,700i');
    wp_enqueue_style('urbana', 'https://use.typekit.net/rtc5csn.css');
  	wp_enqueue_style('theme_style', get_template_directory_uri() . '/css/style.css');
  	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/fontawesome.css');
    wp_enqueue_style('mapbox-style', 'https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css');
  	wp_deregister_script('jquery');
  	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), $ver = false, false );
  	wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array(), $ver = false, false );
  	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery', 'popper'), $ver = false, false );
  	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), $ver = false, false );
    wp_enqueue_script( 'mapbox-gl','https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.js', array(), $ver = false, false );
  	wp_enqueue_script( 'loadmore', get_template_directory_uri().'/js/loadmore.js', array( 'jquery'  ) );
    wp_localize_script( 'loadmore', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')) );
    wp_localize_script('my-ajax-handle', 'the_ajax_script', array('ajax_url' => admin_url('admin-ajax.php')));
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

add_action( 'wp_ajax_import_acf', 'import_acf' );
add_action( 'wp_ajax_nopriv_import_acf', 'import_acf' );

function import_acf() {

  $acf_data = json_decode( file_get_contents( get_template_directory_uri() . '/acf-json/group_5c534d6d2fafc.json' ) );

  wp_die();

}

add_action( 'wp_ajax_load_posts', 'load_posts' );
add_action( 'wp_ajax_nopriv_load_posts', 'load_posts' );

function load_posts(){
    global $post;
	$tax_query = '';
	$args = array(
		'post_type' => $_POST['post_type'],
		'posts_per_page' => $_POST['ppp'],
		'offset' => $_POST['offset'],
		'order' => $_POST['order'],
		'post_status' => 'publish',
		'tax_query' => $tax_query
	);
	$posts=[];
	$query = new WP_Query($args);
	$posts_count = $query->found_posts;
	if($query->have_posts()):
			$i = 0;
			while($query->have_posts()):$query->the_post();
				if (get_the_title()):
					$posts[$i]['title'] = get_the_title();
				endif;
				if (get_permalink()):
					$posts[$i]['permalink'] = get_permalink();
				endif;
				if (get_the_post_thumbnail_url()):
					$posts[$i]['thumb'] = wp_get_attachment_image(get_post_thumbnail_id(), 'medium_large');
				endif;
				if (get_the_author_meta( $field = 'nickname', $user_id = false )):
					$posts[$i]['author'] = get_the_author_meta( $field = 'nickname', $user_id = false );
				endif;
				if ( get_the_date()):
					$posts[$i]['day'] = get_the_date( 'j' );
					$posts[$i]['month'] = get_the_date( 'F' );
					$posts[$i]['year'] = get_the_date( 'Y' );
				endif;
				if (get_the_terms( $post->ID, 'category' )):

					$terms = get_the_terms( $post->ID, 'category' );

					$posts[$i]['category_name'] = $terms[0]->name;
					$posts[$i]['category_slug'] = $terms[0]->slug;

                    $term_id = $terms[0]->term_id;
                    $taxonomy = $terms[0]->taxonomy;
                    $posts[$i]['color'] = get_field('cor', $taxonomy . '_' . $term_id);

				endif;
				$i++;
			endwhile;
			wp_reset_postdata();
			$offset = $_POST['offset']+$_POST['ppp'];
	endif;
	wp_send_json_success(array('posts'=>$posts, 'offset'=>$offset, 'posts_count'=>$posts_count));
}

add_action( 'wp_ajax_filter_posts', 'filter_posts' );
add_action( 'wp_ajax_nopriv_filter_posts', 'filter_posts' );

function filter_posts(){
    if ($_POST['category'] == '') {
        $args = array(
            'post_type'=>$_POST['post_type'],
            'posts_per_page'=> $_POST['ppp'],
			'post_status' => 'publish',
            'order'=> $_POST['order'],
            'offset'=> 0
        );
    } else {
        $args = array(
            'post_type'=>$_POST['post_type'],
            'tax_query' => array(
                array (
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'tax_query' => array(
                        array (
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => $_POST['category'],
                        )
                    ),
                    'terms' => $_POST['category'],
                )
            ),
            'posts_per_page'=> $_POST['ppp'],
            'offset'=> 0,
            'order'=> $_POST['order'],
			'post_status' => 'publish'
        );
    }
    $posts = [];
    $query = new WP_Query($args);
		$posts_count = $query->found_posts;
    if($query->have_posts()):
        $i = 0;
        while($query->have_posts()):$query->the_post();
            if (get_the_title()):
                $posts[$i]['title'] = get_the_title();
            endif;
            if (get_permalink()):
                $posts[$i]['permalink'] = get_permalink();
            endif;
            if (get_the_post_thumbnail_url()):
                $posts[$i]['thumb'] = wp_get_attachment_image(get_post_thumbnail_id(), 'medium_large');
            endif;
            if (get_the_author_meta( $field = 'nickname', $user_id = false )):
                $posts[$i]['author'] = get_the_author_meta( $field = 'nickname', $user_id = false );
            endif;
            if ( get_the_date()):
                $posts[$i]['day'] = get_the_date( 'j' );
                $posts[$i]['month'] = get_the_date( 'F' );
                $posts[$i]['year'] = get_the_date( 'Y' );
            endif;
            if (get_the_terms( $post->ID, 'category' )):

                $terms = get_the_terms( $post->ID, 'category' );

                $posts[$i]['category_name'] = $terms[0]->name;
                $posts[$i]['category_slug'] = $terms[0]->slug;

                $term_id = $terms[0]->term_id;
                $taxonomy = $terms[0]->taxonomy;
                $posts[$i]['color'] = get_field('cor', $taxonomy . '_' . $term_id);

            endif;
            $i++;
        endwhile;
        wp_reset_postdata();
        $offset = $_POST['offset'] + $_POST['ppp'];
    endif;
    wp_send_json_success(array('offset'=>$offset, 'posts'=>$posts, 'posts_count'=>$posts_count));
}

add_action( 'wp_ajax_order_posts', 'order_posts' );
add_action( 'wp_ajax_nopriv_order_posts', 'order_posts' );

function order_posts(){
    if ($_POST['category'] == '') {
        $args = array(
            'post_type'=> $_POST['post_type'],
            'posts_per_page'=> $_POST['ppp'],
			'post_status' => 'publish',
            'order'=> $_POST['order'],
            'offset'=> 0
        );
    } else {
        $args = array(
            'post_type'=>$_POST['post_type'],
            'tax_query' => array(
                array (
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'tax_query' => array(
                        array (
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => $_POST['category'],
                        )
                    ),
                    'terms' => $_POST['category'],
                )
            ),
            'posts_per_page'=> $_POST['ppp'],
            'offset'=> 0,
            'order'=> $_POST['order'],
			'post_status' => 'publish'
        );
    }
    $posts = [];
    $query = new WP_Query($args);
		$posts_count = $query->found_posts;
    if($query->have_posts()):
        $i = 0;
        while($query->have_posts()):$query->the_post();
            if (get_the_title()):
                $posts[$i]['title'] = get_the_title();
            endif;
            if (get_permalink()):
                $posts[$i]['permalink'] = get_permalink();
            endif;
            if (get_the_post_thumbnail_url()):
                $posts[$i]['thumb'] = wp_get_attachment_image(get_post_thumbnail_id(), 'medium_large');
            endif;
            if (get_the_author_meta( $field = 'nickname', $user_id = false )):
                $posts[$i]['author'] = get_the_author_meta( $field = 'nickname', $user_id = false );
            endif;
            if ( get_the_date()):
                $posts[$i]['day'] = get_the_date( 'j' );
                $posts[$i]['month'] = get_the_date( 'F' );
                $posts[$i]['year'] = get_the_date( 'Y' );
            endif;
            if (get_the_terms( $post->ID, 'category' )):

                $terms = get_the_terms( $post->ID, 'category' );

                $posts[$i]['category_name'] = $terms[0]->name;
                $posts[$i]['category_slug'] = $terms[0]->slug;

                $term_id = $terms[0]->term_id;
                $taxonomy = $terms[0]->taxonomy;
                $posts[$i]['color'] = get_field('cor', $taxonomy . '_' . $term_id);

            endif;
            $i++;
        endwhile;
        wp_reset_postdata();
        $offset = $_POST['offset'] + $_POST['ppp'];
    endif;
    wp_send_json_success(array('offset'=>$offset, 'posts'=>$posts, 'posts_count'=>$posts_count));
}
