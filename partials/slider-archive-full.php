<?php
/**
 * Full Page Archive Slider
 *
 * @package LLAL
 */
?>

<?php
    if( have_rows('destaques') ): ?>

    <style>
        .acf-field select option[value=lilas] {
            color: #AC4FC6;
        }

        .acf-field select option[value=azul] {
            color: #418FDE;
        }

        .acf-field select option[value=turquesa] {
            color: #0FB1A9;
        }

        .acf-field select option[value=marrom] {
            color: #683431;
        }

        .acf-field select option[value=amarelo] {
            color: #FCBF2A;
        }

        .acf-field select option[value=verde] {
            color: #BBB323;
        }
    </style>

    <section class="slider archive-full" style="position: relative;">
        <div class="owl-carousel owl-theme bg full-height">
            <?php
                while ( have_rows('destaques') ) : the_row();
                $post =  get_sub_field('post');
                setup_postdata( $post );
            ?>
                <div class="item">
                    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', "", array( "style" => "height: calc(100vh - 3.5rem);" )); ?>
                </div>
                <?php wp_reset_postdata(); endwhile;
            ?>
        </div>

        <div class="full-height w-100" style="position: absolute; top: 0; left: 0;">
            <div id="sliderGrad" class="marrom-gbg" style="opacity: .75; position: absolute; top: 0; left: 0; height: 100%; width: 100%; transition: all 1s ease;"></div>
        </div>

        <div class="owl-carousel owl-theme content full-height d-flex flex-column justify-content-end" style="position: absolute; top: 0; left: 0;">
            <?php
                while ( have_rows('destaques') ) : the_row();
                    $post =  get_sub_field('post');
                    setup_postdata( $post );
                    $postcat = get_the_category( $post );
                    $category_slug = $postcat[0]->slug;
                    $category_name = $postcat[0]->name;
                    $term_id = $postcat[0]->term_id;
                    $taxonomy = $postcat[0]->taxonomy;

                    $cor = get_field('cor', $taxonomy . '_' . $term_id);

                ?>
                    <div class="item d-flex flex-column justify-content-end" data-category="<?php echo $category_slug ?>" data-color="<?php echo $cor; ?>">
                        <div class="custom-container">
                            <div class="row">
                                <div class="col-10 offset-1 col-lg-8 offset-lg-2">
                                    <h2 class="h1 branco"><?php the_title(); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php wp_reset_postdata(); endwhile;
            ?>
        </div>
    </section>

    <script type="text/javascript">

        var owl_highlights = $('.slider.archive-full .owl-carousel.content');
        owl_highlights.owlCarousel({
            loop: true,
            dots: true,
            nav: true,
            items: 1
        });

        var owl_highlights_bg = $('.slider.archive-full .owl-carousel.bg');
        owl_highlights_bg.owlCarousel({
            loop: true,
            dots: false,
            nav: false,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            items: 1
        });

        owl_highlights.on('change.owl.carousel', function(event) {
          if (event.namespace && event.property.name === 'position') {
            var target = event.relatedTarget.relative(event.property.value, true);
            owl_highlights_bg.owlCarousel('to', target, false, true);
            var colorClass = $($('.slider.archive-full .owl-carousel.content .owl-item:not(.cloned) .item')[target]).data('color');
            $("#sliderGrad").removeClass().addClass(colorClass + '-gbg')
          }
        });


    </script>

    <?php endif;
?>
