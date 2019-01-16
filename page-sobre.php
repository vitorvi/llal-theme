<?php
/* Template Name: Sobre */
/**
 * The template for displaying the about
 *
 * @package LLAL
 */
	get_template_part( 'partials/header' );
?>

<?php
    $baseurl = get_template_directory_uri();
?>

<?php if ( have_posts() ) : the_post(); ?>

    <main class="page sobre">
		<?php
		    get_template_part( 'partials/slider', 'brand' );
			get_template_part( 'partials/slider', 'timeline' );
			get_template_part( 'partials/nav', 'golden-circle' );
			get_template_part( 'partials/join-us' );
		?>
    </main>

<?php endif; ?>

<?php
    get_template_part( 'partials/footer' );
?>
