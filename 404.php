<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package LLAL
 */
     if(get_option('maintenance')) :
         get_template_part( 'partials/maintenance' );
     else:
         get_template_part( 'partials/header' );
?>

<?php
    $baseurl = get_template_directory_uri();
?>

<main class="page-404">
    <div class="custom-container">
        <div class="row padding-top-large margin-bottom-medium">
            <div class="col-12 text-center">
                <h1 class="wine text-center">
                    <?php echo $message_404 ?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2 col-lg-4 offset-lg-4 text-center">
                <a class="w-100 d-block padding-top-xlarge padding-bottom-xlarge" href="javascript:history.back()" style="background-image: url(<?php echo esc_url( $baseurl ); ?>/assets/radial-seeds.svg); background-position: center; background-size: contain; background-repeat: no-repeat;">Go Back</a>
            </div>
        </div>
    </div>
</main>

<?php
    get_template_part( 'partials/footer' );
?>

<?php endif; ?>
