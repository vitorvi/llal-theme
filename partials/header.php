<?php
/**
 * The header for our theme
 *
 * @package LLAL
 */
?>

<?php
    $baseurl = get_template_directory_uri();
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>

<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="page-header position-fixed">
		    <nav class="custom-container navbar navbar-expand-lg d-flex justify-content-between">
		        <div class="d-flex flex-grow-1 justify-content-between">
		        	<?php if ( has_custom_logo() ) : ?>
		        	    <a href="<?php echo esc_url( home_url() ); ?>" class="logo d-flex align-items-center flex-row" rel="home">
                            <img src="<?php echo esc_url( $logo[0] ) ?>">
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url( home_url() ); ?>" class="logo d-flex align-items-center flex-row" rel="home">
                            <h1 class="h5 white"><?php echo get_bloginfo( 'name' ) ?></h1>
                        </a>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'secondary_logo' ) ) : ?>
                        <a href="<?php echo esc_url( home_url() ); ?>" class="logo-small d-flex align-items-center flex-row" rel="home">
                            <img src="<?php echo get_theme_mod( 'secondary_logo' ) ?>">
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url( home_url() ); ?>" class="logo-small d-flex align-items-center flex-row" rel="home">
                            <h1 class="h5 white"><?php echo get_bloginfo( 'name' ) ?></h1>
                        </a>
                    <?php endif; ?>
		          	<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => 'div', 'container_id' => 'menu-desktop', 'container_class' => 'd-none d-lg-flex align-items-center flex-row', 'items_wrap' => '<ul class="ml-auto no-bullet d-lg-flex align-items-center flex-row">%3$s</ul>' ) ); ?>
		        </div>
		        <button id="menu-button" class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#menu-mobile" aria-controls="menu-mobile" aria-expanded="false" aria-label="Toggle navigation">
		    		<span id="linha-1" class="linha"></span>
		    	  	<span id="linha-2" class="linha"></span>
		    	  	<span id="linha-3" class="linha"></span>
		    	</button>
		    	<div class="d-lg-none collapse" id="menu-mobile">
		    	    <div class="menu-mobile-container d-flex flex-column justify-content-center align-items-end">
    		    	    <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => '', 'container_class' => '', 'container_id' => '', 'items_wrap' => '<ul class="d-flex align-items-end justify-content-center flex-column flex-wrap">%3$s</ul>' ) ); ?>
    		    	</div>
		    	</div>
		    </nav>
		</header>
