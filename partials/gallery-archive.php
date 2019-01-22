<?php
/**
 * Archive Gallery
 *
 * @package LLAL
 */
?>

<?php
    $query_args = array(
        'posts_per_page' => 3 ,
        'post_type' => 'post'
    );
    $posts_query = new WP_Query( $query_args );
    if ($posts_query -> have_posts()) :
?>

<div class="order-posts padding-top-small padding-bottom-small cinza-bg"></div>
<div class="branco-bg filters border-bottom-cinza padding-top-small padding-bottom-small"></div>
<section class="gallery archive branco-bg padding-top-medium padding-bottom-xlarge">
    <div class="custom-container">
        <div class="row">
            <?php
                while ($posts_query -> have_posts()) : $posts_query -> the_post();
                $postcat = get_the_category( $post->ID );
                if ( ! empty( $postcat ) ) {
                    $area_slug = $postcat[0]->slug;
                    $area_name = $postcat[0]->name;
                }
            ?>
                <a class="col-12 col-md-2 col-lg-4" href="<?php the_permalink() ?>">
                    <?php
                       $post_dia = get_the_date( 'j' );
                       $post_mes = get_the_date( 'F' );
                       $post_ano = get_the_date( 'Y' );
                    ?>
                    <article class="post-thumb slide card visible">
                        <figure class="margin-bottom-xsmall">
                            <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'medium_large'); ?>
                        </figure>
                        <div class="post-info">
                            <h1 class="h4"><span class="tag"><?php echo $area_name; ?></span><?php the_title(); ?></h1>
                            <p class="meta"><span class="autor">Por <?php echo get_the_author_meta( $field = 'nickname', $user_id = false ); ?></span><span class="data"><?php echo $post_dia ?> de <?php echo $post_mes ?></span></p>
                        </div>
                    </article>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php endif; ?>
