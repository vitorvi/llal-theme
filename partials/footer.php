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
                            <a href="<?php echo esc_url( home_url() ); ?>" class="logo d-flex align-items-center flex-row" rel="home">
                                <img src="<?php echo get_theme_mod( 'negative_logo' ) ?>">
                            </a>
                        <?php endif; ?>
                    </div>
        			<div class="col-12 col-md-5 social-media">
                        <p class="text-large branco">Conecte-se com o nosso grupo:</p>
        				<ul class="d-flex branco">

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
                        <p class="branco">Telefone:
                            <span>
                                <?php
                                    if( get_field('telefone', 'options') ):
                                        the_field('telefone', 'options');
                                    endif;
                                ?>
                            </span>
                        </p>
                        <p class="branco">E-mail:
                            <span>
                                <?php
                                    if( get_field('e-mail', 'options') ):
                                        the_field('e-mail', 'options');
                                    endif;
                                ?>
                            </span>
                        </p>
        			</div>
        		</div>
        	</div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>
