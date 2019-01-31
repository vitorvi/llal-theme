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
        <div class="owl-carousel owl-theme bg">
            <?php
                while ( have_rows('destaques') ) : the_row();
                $post =  get_sub_field('post');
                setup_postdata( $post );
            ?>
                <div class="item">
                    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', "", array( "" => "" )); ?>
                </div>
                <?php wp_reset_postdata(); endwhile;
            ?>
        </div>

        <div class="full-height w-100" style="position: absolute; top: 0; left: 0;">
            <?php
                $categories = get_terms( array(
                    'taxonomy' => 'category',
                    'hide_empty' => false,
                ) );
                foreach($categories as $term){
                    if( 0 != $term->count ):
                        $cor = get_field('cor', 'category_' . $term->term_id );
            ?>
                <div id="sliderGrad_<?php echo $cor ?>" class="<?php echo $cor ?>-gbg slider-grad" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; transition: all .3s linear;"></div>
            <?php endif; }?>
        </div>
        <div class="custom-container content">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme">
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
                                <a href="<?php the_permalink() ?>" class="full-height padding-bottom-xlarge item d-flex flex-column justify-content-end" data-category="<?php echo $category_slug ?>" data-color="<?php echo $cor; ?>">
                                    <div class="row subrow">
                                        <div class="col-12 col-lg-8 offset-lg-2">
                                            <p class="tag branco-bg d-inline-block margin-bottom-xsmall <?php echo $cor ?>-bg"><?php echo $category_name ?></p>
                                            <h2 class="h1 branco"><?php the_title(); ?></h2>
                                        </div>
                                    </div>
                                </a>
                            <?php wp_reset_postdata(); endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">

        var owl_highlights = $('.slider.archive-full .content .owl-carousel');
        owl_highlights.owlCarousel({
            loop: true,
            dots: true,
            items: 1,
            responsive : {
                0 : {
                    nav: false,
                    margin: 30
                },
                769 : {
                    nav: false,
                    margin: 0
                },
                1025 : {
                    nav: true,
                    margin: 0
                }
            }
        });

        var owl_highlights_bg = $('.slider.archive-full .owl-carousel.bg');
        owl_highlights_bg.owlCarousel({
            loop: true,
            dots: false,
            nav: false,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            items: 1,
        });

        var colorClass = $($('.slider.archive-full .content .owl-carousel .owl-item.active .item')).data('color');
        $(".slider-grad").removeClass("active");
        $("#sliderGrad_" + colorClass).addClass("active");

        owl_highlights.on('change.owl.carousel', function(event) {
          if (event.namespace && event.property.name === 'position') {
            var target = event.relatedTarget.relative(event.property.value, true);
            owl_highlights_bg.owlCarousel('to', target, false, true);
            colorClass = $($('.slider.archive-full .content .owl-carousel .owl-item:not(.cloned) .item')[target]).data('color');
            $(".slider-grad").removeClass("active");
            $("#sliderGrad_" + colorClass).addClass("active");
          }
        });


    </script>

    <?php endif;
?>
