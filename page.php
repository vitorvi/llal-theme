<?php
/**
 * The template for displaying all pages
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

<?php while ( have_posts() ) : the_post(); ?>

    <main class="<?php the_field('background_color') ?>">

    </main>

<?php endwhile; ?>

<?php
    get_template_part( 'partials/footer' );
?>

<?php endif; ?>
