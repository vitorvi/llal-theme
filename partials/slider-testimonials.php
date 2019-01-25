<?php
/**
 * Testimonials Slider
 *
 * @package LLAL
 */
?>

<?php
    $query_args = array(
        'posts_per_page' => -1 ,
        'post_type' => 'depoimento'
    );
    $posts_query = new WP_Query( $query_args );
    if ($posts_query -> have_posts()) :
?>

    <section class="slider testimonials padding-top-large turquesa-bg">
        <div class="custom-container">
            <div class="row">
                <div class="col-12 text-center">

                    <div class="owl-carousel owl-theme padding-bottom-xlarge">
                        <?php
                            while ($posts_query -> have_posts()) : $posts_query -> the_post();
                            $postcat = get_the_category( $post->ID );
                            if ( ! empty( $postcat ) ) {
                                $area_slug = $postcat[0]->slug;
                                $area_name = $postcat[0]->name;
                            }
                        ?>
                            <div class="row subrow">
                                <?php
                                   $post_dia = get_the_date( 'j' );
                                   $post_mes = get_the_date( 'F' );
                                   $post_ano = get_the_date( 'Y' );
                                ?>
                                <figure class="col-5 col-lg-3 offset-lg-1">
                                    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'medium_large'); ?>
                                </figure>
                                <div class="col-7 d-lg-none">
                                    <p class="autor branco"><?php the_title(); ?></p>
                                    <p class="cargo branco"><?php the_field('cargo'); ?></p>
                                </div>
                                <div class="testimonial-info col-12 col-lg-6 offset-lg-1">
                                    <?php the_field('texto') ?>
                                    <p class="meta branco d-none d-lg-block"><span class="autor"><?php the_title(); ?>, </span><span class="cargo"><?php the_field('cargo'); ?></span></p>
                                </div>
                            </div>

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
        var owl_testimonials = $('.slider.testimonials .owl-carousel');
        owl_testimonials.owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            items: 1
        });
    </script>

<?php endif; ?>
