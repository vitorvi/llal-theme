<?php
/* Template Name: Notícia */
/**
 * The template for displaying the single blog post
 *
 * @package LLAL
 */
	get_template_part( 'partials/header' );
?>

<?php
    $baseurl = get_template_directory_uri();
?>

<?php while ( have_posts() ) : the_post(); ?>

    <main class="page single">

    </main>

<?php endwhile; ?>

<?php
    get_template_part( 'partials/footer' );
?>