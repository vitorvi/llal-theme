<?php
/* Template Name: Notícias */
/**
 * The template for displaying the archive page
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

    <main class="page archive">
		<?php
		  get_template_part( 'partials/slider', 'archive-full' );
      get_template_part( 'partials/order-posts' );
      get_template_part( 'partials/filters' );
			get_template_part( 'partials/gallery', 'archive' );
		?>
    </main>

<?php endwhile; ?>

<?php
    get_template_part( 'partials/footer' );
?>

<?php endif; ?>
