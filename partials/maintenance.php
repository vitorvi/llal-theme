<?php
/**
 * Maintenance Page
 *
 * @package LLAL
 */
 $baseurl = get_template_directory_uri();
?>

<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> style="background-color: #00aeac;">
        <main class="full-height d-flex flex-column align-items-center justify-content-center">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12">
                		<a href="">
                			<img class="d-lg-none w-100" id="tampao_phone" src="<?php echo $baseurl ?>/assets/tampao_phone.png">
                			<img class="d-none d-lg-block w-100" id="tampao_desktop" src="<?php echo $baseurl ?>/assets/tampao_desktop.png">
                		</a>
                    </div>
                </div>
            </div>
    	</main>
        <?php wp_footer(); ?>
    </body>
</html>
