<?php
/* Template Name: Notícia */
/**
 * The template for displaying the single blog post
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

    <?php
        $postcat = get_the_category( $post->ID );
        if ( ! empty( $postcat ) ):
            $area_slug = $postcat[0]->slug;
            $area_name = $postcat[0]->name;
        endif;
    ?>

    <main class="page single">
        <div class="post-content">
            <div class="custom-container">
                <div class="row padding-top-medium">
                    <div class="col-12">
                        <a href="javascript:history.back()">Voltar</a>
                        <span class="tag"><?php echo $area_name; ?></span>
                    </div>
                    <div class="col-12 col-lg-10 offset-lg-1">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="col-12 col-lg-10 offset-lg-1 margin-top-small">
                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large'); ?>
                    </div>
                </div>
                <div class="row padding-top-medium padding-bottom-xlarge">
                    <div class="col-12 col-lg-8 offset-lg-2">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php get_template_part( 'partials/slider', 'related' ); ?>
    </main>

<?php endwhile; ?>

<?php
    get_template_part( 'partials/footer' );
?>

<?php endif; ?>
