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
        			<div class="col-12 col-md-4 social-media">
        				<ul class="d-flex white">

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
        			</div>
        		</div>
        	</div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>
