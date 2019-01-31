<?php
/**
 * The template for displaying the footer
 *
 * @package LLAL
 */

?>

<?php
    $baseurl = get_template_directory_uri();
?>

        <footer class="page-footer marrom-bg padding-top-medium padding-bottom-xlarge" id="contato">
        	<div class="custom-container">
        		<div class="row">
              <div class="col-12 col-md-7">
                  <?php if ( get_theme_mod( 'negative_logo' ) ) : ?>
                      <a href="<?php echo esc_url( home_url() ); ?>" class="logo d-flex align-items-center flex-row justify-content-center justify-content-md-start" rel="home">
                          <img src="<?php echo get_theme_mod( 'negative_logo' ) ?>" class="logo-footer">
                      </a>
                  <?php endif; ?>
                  <?php if( have_rows('empresas', 'options') ): ?>
                    <div class="logos-empresas margin-top-medium margin-bottom-xsmall d-flex flex-row flex-wrap justify-content-center justify-content-md-start">
                       <?php while( have_rows('empresas', 'options') ) : the_row(); $logo = get_sub_field('logo', 'options'); ?>
                            <a href="<?php echo the_sub_field('link', 'options') ?>" target="_blank">
                              <?php echo wp_get_attachment_image($logo, 'medium_large'); ?>
                            </a>
                        <?php endwhile; ?>
                    </div>
                  <?php endif; ?>
              </div>
        			<div class="col-12 col-md-5 margin-top-medium">
                        <p class="text-large branco text-center text-md-left margin-bottom-small">Conecte-se com o nosso grupo:</p>
                				<ul class="social-media d-flex branco justify-content-center justify-content-md-start margin-bottom-small">

                              <?php if( have_rows('redes_sociais', 'options') ):  ?>
                                  <?php while( have_rows('redes_sociais', 'options') ) : the_row(); ?>

                                      <li>
                                          <a href="<?php the_sub_field('link', 'options'); ?>" target="_blank">
                                              <i class="fab fa-<?php the_sub_field('icone', 'options'); ?>"></i>
                                          </a>
                                      </li>

                                  <?php endwhile; ?>
                              <?php endif; ?>

                				</ul>
                        <p class="branco text-center text-md-left">Telefone:
                            <strong>
                                <?php
                                    if( get_field('telefone', 'options') ):
                                        the_field('telefone', 'options');
                                    endif;
                                ?>
                            </strong>
                        </p>
                        <p class="branco text-center text-md-left margin-top-micro">E-mail:
                            <strong>
                                <?php
                                    if( get_field('e-mail', 'options') ):
                                        the_field('e-mail', 'options');
                                    endif;
                                ?>
                            </strong>
                        </p>
        			</div>
        		</div>
        	</div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>
