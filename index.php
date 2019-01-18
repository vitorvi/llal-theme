<?php
/**
 * The main template file
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

    <main class="custom-content <?php the_field('background_color') ?>">
        <?php the_content(); ?>
    </main>

<?php endwhile; ?>

<?php
    get_template_part( 'partials/footer' );
?>

<?php endif; ?>
