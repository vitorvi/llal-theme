<?php
/**
 * Archive Gallery
 *
 * @package LLAL
 */
?>

<?php
    $postsPerPage = 6;
    $postType = 'post';
    $order = 'desc';
    $query_args = array(
        'posts_per_page' => $postsPerPage,
        'post_type' => $postType,
        'order' => $order,
        'post_status' => 'publish'
    );
    $posts_query = new WP_Query( $query_args );
    if ($posts_query -> have_posts()) :
        $posts_count = wp_count_posts('post')->publish;
?>

<section class="gallery archive branco-bg padding-top-medium padding-bottom-xlarge">
    <div class="custom-container">
        <div class="row" id="ajaxContainer">
            <?php
                $i = 1;
                while ($posts_query -> have_posts()) : $posts_query -> the_post();
                $postcat = get_the_category( $post->ID );
                if ( ! empty( $postcat ) ) {
                    $area_slug = $postcat[0]->slug;
                    $area_name = $postcat[0]->name;

                    $term_id = $postcat[0]->term_id;
                    $taxonomy = $postcat[0]->taxonomy;
                    $color = get_field('cor', $taxonomy . '_' . $term_id);
                }
            ?>
                <a class="col-12 col-md-6 col-lg-4" href="<?php the_permalink() ?>">
                    <?php
                       $post_dia = get_the_date( 'j' );
                       $post_mes = get_the_date( 'F' );
                       $post_ano = get_the_date( 'Y' );
                    ?>
                    <article class="post-thumb slide card visible margin-bottom-medium">
                        <figure class="margin-bottom-xsmall">
                            <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'medium_large'); ?>
                        </figure>
                        <div class="post-info">
                            <h1 class="h4 margin-bottom-micro"><span class="tag<?php echo " ".$color."-bg" ?>"><?php echo $area_name; ?></span><?php the_title(); ?></h1>
                            <p class="meta text-small cinza-4">
                              <span class="autor">Por <strong>&nbsp;<?php echo get_the_author_meta( $field = 'nickname', $user_id = false ); ?></strong></span>
                              <span class="data"><?php echo $post_dia ?> de <?php echo $post_mes ?></span>
                            </p>
                        </div>
                    </article>
                </a>

            <?php $i++; endwhile; ?>
        </div>
        <div class="row">
            <div class="col-12">
              <div class="text-center">
                  <a id="more_posts" class="btn button-large margin-top-small cinza-3 loadmore <?php if ($i <= $posts_count): ?>d-inline-block<?php else: ?>d-none<?php endif; ?>" data-order="<?php echo $order; ?>" data-post-type="<?php echo $postType; ?>" data-ppp="<?php echo $postsPerPage; ?>" data-offset="<?php echo $postsPerPage; ?>">Ver mais</a>
              </div>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>
