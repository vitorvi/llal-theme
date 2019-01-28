<?php
/**
 * Timeline Slider
 *
 * @package LLAL
 */
?>

<?php
    if( have_rows('nossa_historia') ): ?>
        <section class="slider timeline cinza-bg">
            <div class="titulo w-100 position-absolute">
                <div class="custom-container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="h4 padding-top-medium text-center text-md-left">Nossa história</h2>
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
                                    <div class="col-12 col-lg-4 padding-bottom-large">
                                        <h3 class="ano margin-top-xsmall text-center text-md-left turquesa"><?php the_sub_field('titulo'); ?></h2>
                                        <p class="texto margin-top-xsmall text-center text-lg-left"><?php the_sub_field('texto'); ?></p>
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
                        <div class="col-12 col-lg-4 padding-bottom-large">
                            <div class="position-relative">
                                <button class="prev disabled"></button>
                                <button class="next"></button>
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
            $('#navTimeline .prev').addClass('disabled').text($($('.owl-item .ano')[currentIndex - 1]).text());;
            $('#navTimeline .next').removeClass('disabled').text($($('.owl-item .ano')[nextIndex]).text());

            owl_timeline.on('changed.owl.carousel', function (e) {
              currentIndex = e.item.index;
              nextIndex = currentIndex + 1;
              $('#navTimeline .prev').text($($('.owl-item .ano')[currentIndex - 1]).text());
              $('#navTimeline .next').text($($('.owl-item .ano')[nextIndex]).text());
              if(currentIndex == 0) {
                  $('#navTimeline .prev').addClass('disabled');
              } else {
                  $('#navTimeline .prev').removeClass('disabled').text($($('.owl-item .ano')[currentIndex - 1]).text());
              }
              if(nextIndex >= owlSize) {
                  $('#navTimeline .next').addClass('disabled');
              } else {
                  $('#navTimeline .next').removeClass('disabled').text($($('.owl-item .ano')[nextIndex]).text());
              }
              nextYear = $($('.owl-item .ano')[nextIndex]).text();
            });
            </script>

    <?php endif;
?>
