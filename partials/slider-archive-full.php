<?php
/**
 * Full Page Archive Slider
 *
 * @package LLAL
 */
?>

<?php
    if( have_rows('destaques') ): ?>

    <section class="slider archive-full marrom-gbg">
        <div class="owl-carousel owl-theme">
            <?php
                while ( have_rows('destaques') ) : the_row();
                    $post =  get_sub_field('post');;
                    setup_postdata( $post );
                ?>
                    <div class="item full-height d-flex flex-column justify-content-end">
                        <div class="custom-container">
                            <div class="row">
                                <div class="col-10 offset-1 col-lg-8 offset-lg-2">
                                    <h2 class="h1"><?php the_title(); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php wp_reset_postdata(); endwhile;
            ?>
        </div>
    </section>

    <script type="text/javascript">
        var owl_highlights = $('.slider.archive-full .owl-carousel');
        owl_highlights.owlCarousel({
            loop: true,
            dots: true,
            nav: true,
            items: 1
        });
    </script>

    <?php endif;
?>
