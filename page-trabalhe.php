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
			<div class="custom-container">
				<div class="row">
					<div class="col-12 col-lg-8 offset-lg-2">
						<h1 class="text-center margin-bottom-xsmall"><?php the_field('titulo') ?></h1>
						<p><?php the_field('intro') ?></p>
					</div>
				</div>
			</div>
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
