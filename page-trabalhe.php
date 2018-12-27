<?php
/* Template Name: Trabalhe Conosco */
/**
 * The template for displaying the join us page
 *
 * @package LLAL
 */
	get_template_part( 'partials/header' );
?>

<?php
    $baseurl = get_template_directory_uri();
?>

<?php while ( have_posts() ) : the_post(); ?>

    <main class="page trabalhe">
		<section class="full-height turquesa-bg">
		</section>
		<section class="branco-bg padding-bottom-xlarge padding-top-xlarge">
		</section>
		<?php
			get_template_part( 'partials/slider', 'testimonials' );
			get_template_part( 'partials/join-us' );
		?>
    </main>

<?php endwhile; ?>

<?php
    get_template_part( 'partials/footer' );
?>
