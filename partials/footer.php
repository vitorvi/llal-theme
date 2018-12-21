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

        <footer class="page-footer wine-bg padding-top-xlarge padding-bottom-xlarge">
        	<div class="custom-container">
        		<div class="row">
        			<div class="col-12 col-md-4 links">
        				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => '', 'container_class' => '', 'container_id' => '', 'items_wrap' => '<ul class="white">%3$s</ul>' ) ); ?>
        			</div>
        			<div class="col-12 col-md-4 social-media">
        				<ul class="d-flex white">

                            <?php if( have_rows('social_media_links', 'options') ):  ?>
                                <?php while( have_rows('social_media_links', 'options') ) : the_row(); ?>

                                    <?php if( have_rows('social_media', 'options') ): ?>
                                        <?php while( have_rows('social_media', 'options') ) : the_row(); ?>

                                            <li>
                                                <a href="<?php the_sub_field('link', 'options'); ?>" target="_blank">
                                                    <i class="fab fa-<?php the_sub_field('icon', 'options'); ?>"></i>
                                                </a>
                                            </li>

                                    	<?php endwhile; ?>
                                    <?php endif; ?>

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
