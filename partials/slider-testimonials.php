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
                            $i = 1;
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
                                <figure class="col-5 col-lg-3 offset-lg-1 margin-bottom-xsmall">
                                  <svg width="100%" height="100%" viewBox="0 0 282 324" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                      <pattern id="img_<?php echo $i ?>" patternUnits="userSpaceOnUse" width="115%" height="115%">
                                        <image xlink:href="<?php echo wp_get_attachment_url(get_post_thumbnail_id(), 'medium_large'); ?>" x="-7.5%" y="-7.5%" width="115%" height="115%" filter="url(#colorAmarelo)" />
                                      </pattern>
                                    </defs>
                                    <path class="foto" d="M126.225 4.04951C135.359 -1.34983 146.641 -1.34984 155.775 4.04951L267.374 70.0127C276.429 75.3649 282 85.2112 282 95.8616V228.138C282 238.789 276.429 248.635 267.374 253.987L155.775 319.95C146.641 325.35 135.359 325.35 126.225 319.951L14.6264 253.987C5.57147 248.635 0 238.789 0 228.138V95.8616C0 85.2112 5.57148 75.3649 14.6264 70.0127L126.225 4.04951Z" fill="url(#img_<?php echo $i ?>)"/>
                                    <path class="hex-frame" d="M126.225 4.04951C135.359 -1.34983 146.641 -1.34984 155.775 4.04951L267.374 70.0127C276.429 75.3649 282 85.2112 282 95.8616V228.138C282 238.789 276.429 248.635 267.374 253.987L155.775 319.95C146.641 325.35 135.359 325.35 126.225 319.951L14.6264 253.987C5.57147 248.635 0 238.789 0 228.138V95.8616C0 85.2112 5.57148 75.3649 14.6264 70.0127L126.225 4.04951Z" />
                                  </svg>
                                </figure>
                                <div class="col-7 d-lg-none margin-bottom-xsmall d-flex flex-column justify-content-center">
                                    <p class="autor branco"><strong><?php the_title(); ?></strong></p>
                                    <p class="cargo branco"><?php the_field('cargo'); ?></p>
                                </div>
                                <div class="testimonial-info col-12 col-lg-6 offset-lg-1">
                                    <p class="text-large branco"><?php the_field('texto') ?></p>
                                    <p class="meta branco d-none d-lg-block text-large"><strong class="autor"><?php the_title(); ?>, </strong><span class="cargo"><?php the_field('cargo'); ?></span></p>
                                </div>
                            </div>

                        <?php
                        	$i++; endwhile;
                        	wp_reset_postdata();
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <svg class="filters-svg" xmlns="http://www.w3.org/2000/svg" version="1.1">
      <filter id="colorAmarelo" x="0%" y="0%" width="100%" height="100%">
        <feFlood flood-color="#FCBF2A" flood-opacity=".5" result="flood"></feFlood>
        <feBlend mode="color" in1="flood" in2="SourceGraphic"></feBlend>
      </filter>
      <filter id="colorLilas" x="0%" y="0%" width="100%" height="100%">
        <feFlood flood-color="#AC4FC6" flood-opacity=".5" result="flood"></feFlood>
        <feBlend mode="color" in1="flood" in2="SourceGraphic"></feBlend>
      </filter>
      <filter id="colorMarrom" x="0%" y="0%" width="100%" height="100%">
        <feFlood flood-color="#683431" flood-opacity=".5" result="flood"></feFlood>
        <feBlend mode="color" in1="flood" in2="SourceGraphic"></feBlend>
      </filter>
    </svg>

    <script type="text/javascript">
        var owl_testimonials = $('.slider.testimonials .owl-carousel');
        owl_testimonials.owlCarousel({
            loop: true,
            dots: true,
            items: 1,
            responsive : {
                0 : {
                    nav: false
                },
                1025 : {
                    nav: true
                }
            }
        });
    </script>

<?php endif; ?>
