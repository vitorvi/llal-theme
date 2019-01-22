<?php
/**
 * Brand Slider
 *
 * @package LLAL
 */
?>

<?php
    if( have_rows('capa') ): ?>

    <style>
        main {
            padding-top: 4.5rem;
        }
        .owl-carousel.bg, .owl-carousel.content, .mask-container {
            width: 100%;
            height: 80vh;
            position: relative;
        }
        .owl-carousel.bg, .mask-container {
            pointer-events: none;
        }
        .owl-carousel.content, .mask-container {
            position: absolute;
            top: 0;
            left: 0;
        }
        .owl-carousel.content .owl-dots {
            position: absolute;
            bottom: 1rem;
            left: 50%;
            transform: translateX(-50%);
        }
        .owl-carousel.bg .owl-stage-outer, .owl-carousel.bg .owl-stage, .owl-carousel.bg .owl-item, .owl-carousel.bg .item, .owl-carousel.bg img {
            display: block;
            height: 100%;
            width: 100%;
        }
        .owl-carousel.bg img {
            object-fit: cover;
        }
        .mask-container {
            overflow: visible;
        }
        .owl-carousel.mask{
            position: absolute;
            top: calc(50% - 50vw);
            left: calc(50% - 40vh);
            height: 100vw;
            width: 80vh;
            transform: rotate(-270deg);
        }
        .owl-carousel.mask .item {
            height: 100vw;
            transform-origin: center;
            transform: rotate(180deg);
        }
        .owl-carousel.mask .item img {
            object-fit: cover;
            width: 100vw;
            height: calc(80vh + 120px);
            transform-origin: top left;
            transform: translateX(calc(80vh + 60px)) rotate(90deg);
        }
    </style>

    <section class="slider brand branco-bg position-relative">

            <div class="owl-carousel owl-theme bg turquesa-bg">
                <?php while ( have_rows('capa') ) : the_row(); ?>
                    <div class="item turquesa-bg">
                        <?php echo wp_get_attachment_image(get_sub_field('imagem_de_fundo'), 'full'); ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="mask-container d-none d-md-block">
                <div class="owl-carousel owl-theme mask">
                    <?php while ( have_rows('capa') ) : the_row(); ?>
                        <div class="item"><?php echo wp_get_attachment_image(get_sub_field('elemento_grafico'), 'full'); ?></div>
                    <?php endwhile; ?>
                </div>
            </div>

            <div class="owl-carousel owl-theme content d-flex flex-row flex-md-column align-items-start justify-content-center">
                <?php while ( have_rows('capa') ) : the_row(); ?>
                    <div class="item">
                        <div class="custom-container">
                            <div class="row">
                                <div class="col-12 col-md-5 d-flex flex-column justify-content-center">
                                    <h2 class="h1 marrom text-center text-md-right margin-bottom-small margin-top-small"><?php the_sub_field('titulo') ?>&nbsp;</h2>
                                </div>
                                <div class="col-12 col-md-4 offset-md-3">
                                    <div class="imagem margin-bottom-small">
                                        <div class="row subrow">
                                            <div class="d-none d-md-flex col-12">
                                                <?php echo wp_get_attachment_image(get_sub_field('imagem'), 'large'); ?>
                                            </div>
                                            <div class="d-flex d-md-none col-10 offset-1">
                                                <?php echo wp_get_attachment_image(get_sub_field('imagem_mobile'), 'medium'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-large branco text-center text-md-left"><?php the_sub_field('descricao') ?></p>
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
            items: 1,
            margin: 0,
            margin: 120
        });

        var owl_brand_content = $('.slider.brand .owl-carousel.content');
        owl_brand_content.owlCarousel({
            loop: false,
            dots: true,
            nav: false,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            items: 1,
            animateOut: 'fadeOut',
        });

        owl_brand_content.on('change.owl.carousel', function(event) {
          if (event.namespace && event.property.name === 'position') {
            var target = event.relatedTarget.relative(event.property.value, true);
            owl_brand_mask.owlCarousel('to', target, false, true);
            owl_brand_bg.owlCarousel('to', target, false, true);
          }
        })

    </script>
    <?php endif;
?>
