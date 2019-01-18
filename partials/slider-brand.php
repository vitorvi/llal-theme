<?php
/**
 * Brand Slider
 *
 * @package LLAL
 */
?>

<?php
    if( have_rows('capa') ): ?>
    <section class="slider brand branco-bg">

            <div class="owl-carousel owl-theme bg">
                <?php while ( have_rows('capa') ) : the_row(); ?>
                    <div class="item padding-top-xlarge padding-bottom-xlarge marrom-bg"></div>
                <?php endwhile; ?>
            </div>

            <div class="owl-carousel owl-theme mask">
                <?php while ( have_rows('capa') ) : the_row(); ?>
                    <div class="item padding-top-xlarge padding-bottom-xlarge turquesa-bg"></div>
                <?php endwhile; ?>
            </div>

            <div class="owl-carousel owl-theme content">
                <?php while ( have_rows('capa') ) : the_row(); ?>
                    <div class="item padding-top-xlarge padding-bottom-xlarge marrom-bg">
                        <div class="custom-container">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="h1"><?php the_sub_field('titulo') ?></h2>
                                </div>
                                <div class="col-4 offset-2">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

    </section>

    <script type="text/javascript">

        var owl_brand_bg = $('.slider.brand .owl-carousel.bg');
        owl_brand_bg.owlCarousel({
            loop: false,
            dots: false,
            nav: false,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            items: 1
        });

        var owl_brand_mask = $('.slider.brand .owl-carousel.mask');
        owl_brand_mask.owlCarousel({
            loop: false,
            dots: false,
            nav: false,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            items: 1
        });

        var owl_brand_content = $('.slider.brand .owl-carousel.content');
        owl_brand_content.owlCarousel({
            loop: false,
            dots: true,
            nav: false,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            items: 1
        });

        owl_brand_content.on('change.owl.carousel', function(event) {
          if (event.namespace && event.property.name === 'position') {
            var target = event.relatedTarget.relative(event.property.value, true);
            owl_brand_mask.owlCarousel('to', target, 300, true);
            owl_brand_bg.owlCarousel('to', target, 300, true);
          }
        })

    </script>
    <?php endif;
?>
