<?php
/**
 * Archive Gallery
 *
 * @package LLAL
 */
?>

<?php
    $postsPerPage = 3;
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

<div class="order-posts padding-top-small padding-bottom-small cinza-bg"></div>
<div class="branco-bg filters border-bottom-cinza padding-top-small padding-bottom-small">
    <div class="custom-container">
        <div class="row">
            <div class="col-12 d-flex flex-row justify-content-center flex-wrap">
                <a class="tag cinza-3 filter filter_posts active" data-post-type="post" data-post-category="">Todos</a>
                <?php
                    $categories = get_terms( array(
                        'taxonomy' => 'category',
                        'hide_empty' => false,
                    ) );
                    foreach($categories as $term){
                        if( 0 != $term->count ):
                            $cor = get_field('cor', 'category_' . $term->term_id );
                ?>
                    <a class="tag <?php echo $cor ?>-bg cinza-3 filter filter_posts" data-post-type="post" data-post-category="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                <?php endif; }?>
            </div>
        </div>
    </div>
</div>
<section class="gallery archive branco-bg padding-top-medium padding-bottom-xlarge">
    <div class="custom-container">
        <div class="row">
            <?php
                $i = 1;
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
            <?php $i++; endwhile; ?>
        </div>
        <div class="row">
            <div class="col-12">
              <div class="text-center">
                  <a id="more_posts" class="button-large margin-top-small cinza-3 loadmore <?php if ($i <= $posts_count): ?>d-inline-block<?php else: ?>d-none<?php endif; ?>" data-order="<?php echo $order; ?>" data-post-type="<?php echo $postType; ?>" data-ppp="<?php echo $postsPerPage; ?>" data-offset="<?php echo $postsPerPage; ?>">Ver mais</a>
              </div>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>
