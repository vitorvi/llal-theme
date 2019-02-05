<?php
/**
 * Timeline Slider
 *
 * @package LLAL
 */
?>

<?php
    if( have_rows('nossa_historia') ): ?>
        <section class="slider timeline cinza-1-bg">
            <div class="titulo w-100 position-absolute">
                <div class="custom-container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="h3 padding-top-large text-center text-md-left">Nossa história</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme">
                <?php
                    $i = 0;
                    while ( have_rows('nossa_historia') ) : the_row();
                    ?>
                        <div class="item">
                            <div class="custom-container padding-top-xlarge padding-bottom-large">
                                <div class="row">
                                    <div class="col-12 col-md-5 col-lg-4">
                                        <h3 class="ano margin-top-medium text-center text-md-left turquesa"><?php the_sub_field('titulo'); ?></h2>
                                        <p class="texto margin-top-xsmall text-center text-md-left"><?php the_sub_field('texto'); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="imagem"><?php echo wp_get_attachment_image(get_sub_field('imagem'), 'large'); ?></div>
                        </div>
                    <?php $i++; endwhile;
                ?>
            </div>
            <div id="navTimeline">
                <div class="custom-container">
                    <div class="row">
                        <div class="col-10 offset-1 col-md-5 offset-md-0 col-lg-4 padding-bottom-large">
                            <div class="d-flex d-row justify-content-between">
                                <button class="prev button-large turquesa disabled"><span class="arrow">‹</span><span class="text d-none d-md-inline-block"></span></button>
                                <button class="next button-large turquesa"><span class="text d-none d-md-inline-block"></span><span class="arrow">›</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript">
            var owl_timeline = $('.slider.timeline .owl-carousel');
            owl_timeline.owlCarousel({
                loop: false,
                dots: false,
                nav: false,
                items: 1
            });
            $('#navTimeline .next').click(function() {
                owl_timeline.trigger('next.owl.carousel');
            })
            $('#navTimeline .prev').click(function() {
                owl_timeline.trigger('prev.owl.carousel');
            });

            var owlSize = <?php echo $i; ?>;
            var currentIndex = 0;
            var nextIndex = currentIndex + 1;
            var nextYear = $($('.owl-item .ano')[nextIndex]).text();
            $('#navTimeline .prev').addClass('disabled').find('.text').text($($('.owl-item .ano')[currentIndex - 1]).text());;
            $('#navTimeline .next').removeClass('disabled').find('.text').text($($('.owl-item .ano')[nextIndex]).text());

            owl_timeline.on('changed.owl.carousel', function (e) {
              currentIndex = e.item.index;
              nextIndex = currentIndex + 1;
              $('#navTimeline .prev').find('.text').text($($('.owl-item .ano')[currentIndex - 1]).text());
              $('#navTimeline .next').find('.text').text($($('.owl-item .ano')[nextIndex]).text());
              if(currentIndex == 0) {
                  $('#navTimeline .prev').addClass('disabled');
              } else {
                  $('#navTimeline .prev').removeClass('disabled').find('.text').text($($('.owl-item .ano')[currentIndex - 1]).text());
              }
              if(nextIndex >= owlSize) {
                  $('#navTimeline .next').addClass('disabled');
              } else {
                  $('#navTimeline .next').removeClass('disabled').find('.text').text($($('.owl-item .ano')[nextIndex]).text());
              }
              nextYear = $($('.owl-item .ano')[nextIndex]).text();
            });
            </script>

    <?php endif;
?>
