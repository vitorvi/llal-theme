<?php
/**
 * Related Posts Slider
 *
 * @package LLAL
 */
?>

<?php
    $related = new WP_Query(
        array(
            'category__in'   => wp_get_post_categories( $post->ID ),
            'posts_per_page' => 3,
            'post__not_in'   => array( $post->ID )
        )
    );
    if( $related->have_posts() ) :
?>

    <section class="slider archive cinza-1-bg padding-top-large padding-bottom-large">
        <div class="custom-container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-center">Mais notícias</h2>

                    <div class="owl-carousel owl-theme margin-top-medium">
                        <?php
                            while ($related -> have_posts()) : $related -> the_post();
                            $postcat = get_the_category( $post->ID );
                            if ( ! empty( $postcat ) ) {
                              $area_slug = $postcat[0]->slug;
                              $area_name = $postcat[0]->name;

                              $term_id = $postcat[0]->term_id;
                              $taxonomy = $postcat[0]->taxonomy;
                              $color = get_field('cor', $taxonomy . '_' . $term_id);
                            }
                        ?>
                            <a class="item" href="<?php the_permalink() ?>">
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
                                        <h1 class="h4 margin-bottom-micro"><span class="tag<?php echo " ".$color."-bg" ?>"><?php echo $area_name; ?></span><?php the_title(); ?></h1>
                                        <p class="meta text-small cinza-4">
                                          <span class="autor">Por <strong>&nbsp;<?php echo get_the_author_meta( $field = 'nickname', $user_id = false ); ?></strong></span>
                                          <span class="data"><?php echo $post_dia ?> de <?php echo $post_mes ?></span>
                                        </p>
                                </article>
                            </a>

                        <?php
                        	endwhile;
                        	wp_reset_postdata();
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        var owl_archive = $('.slider.archive .owl-carousel');
        owl_archive.owlCarousel({
            loop: false,
            dots: false,
            responsive : {
                0 : {
                    margin: 24,
                    items: 1
                },
                768 : {
                    margin: 24,
                    items: 2
                },
                1025 : {
                    margin: 28,
                    items: 3
                }
            }
        });
    </script>

<?php endif; ?>
