<?php
/* Template Name: Lojas */
/**
 * The template for displaying the stores page
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

    <main class="page lojas">
		<?php
		    get_template_part( 'partials/stores' );
			get_template_part( 'partials/stores-search' );
			get_template_part( 'partials/join-us' );
		?>
    </main>

<?php endwhile; ?>

<?php
    get_template_part( 'partials/footer' );
?>

<?php endif; ?>
