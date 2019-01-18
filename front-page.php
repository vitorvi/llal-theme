<?php
/* Template Name: Home */
/**
 * The template for displaying the home
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

	<?php if ( have_posts() ) : the_post(); ?>

		<main class="page home">
			<?php
			    get_template_part( 'partials/slider', 'archive-full' );
				get_template_part( 'partials/slider', 'testimonials' );
				get_template_part( 'partials/join-us' );
				get_template_part( 'partials/slider', 'archive' );
				get_template_part( 'partials/stores' );
			?>
		</main>

	<?php endif; ?>

	<?php
	    get_template_part( 'partials/footer' );
	?>

<?php endif; ?>
