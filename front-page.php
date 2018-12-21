<?php
/* Template Name: Home */
/**
 * The template for displaying the home
 *
 * @package LLAL
 */
	get_template_part( 'partials/header' );
?>

<?php
    $baseurl = get_template_directory_uri();
?>

<?php while ( have_posts() ) : the_post(); ?>

    <main class="home">

    </main>

<?php endwhile; ?>

<?php
    get_template_part( 'partials/footer' );
?>
