<?php
/* Template Name: Trabalhe Conosco */
/**
 * The template for displaying the join us page
 *
 * @package LLAL
 */
	 if(get_option('maintenance')) :
		 get_template_part( 'partials/maintenance' );
	 else:
		 get_template_part( 'partials/header' );
?>

<?php
    $baseurl = get_template_directory_uri();
?>

<?php while ( have_posts() ) : the_post(); ?>

    <main class="page trabalhe">
		<section class="turquesa-bg position-relative">

			<?php
				$iframe = get_field('video');
				preg_match('/src="(.+?)"/', $iframe, $matches);
				$src = $matches[1];
				$params = array(
					'rel'    => 0,
					'enablejsapi' => 1,
					'version' => '3',
					'playerapiid' => 'ytplayer'
				);
				$new_src = add_query_arg($params, $src);
				$iframe = str_replace($src, $new_src, $iframe);
				$attributes = 'class="oembed_video'.''.'"'.' id="videoCover"';
				$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
			?>
			<style type="text/css">
				.oembed_video {
					position:absolute;
					top:0;left:0;
					width:100%;
					height:100%;
				}
			</style>

			<div class="embed-container"  style="padding:56.25% 0 0 0;position:relative;">
				<?php echo $iframe; ?>
			</div>

			<section id="videoPoster" class="d-flex flex-column justify-content-center" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; height: 100%; width: 100%;">
				<?php echo wp_get_attachment_image(get_field('capa'), 'full', "", array( "style" => "top: 0; left: 0; right: 0; bottom: 0; height: 100%; width: 100%;" )); ?>
				<div class="custom-container" style="position: absolute; width: 100%; height: 100%;">
					<div class="row">
						<div class="col-12 text-center">
							<button id="playVideo" type="button" class="play-button" data-toggle="modal" data-target="#homeCoverVideo">
								<svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg" style="width: 4rem">
									<circle cx="60" cy="60" r="58" stroke-linejoin="round"/>
								    <path d="M89.8579 61.2157L43.9226 36.897V85.5343L89.8579 61.2157Z" stroke-linejoin="round"/>
								</svg>
							</button>
						</div>
					</div>
				</div>
			</section>

			<script type="text/javascript">
			$(document).ready(function() {
				$('#playVideo').on('click', function(ev) {
					$("#videoCover")[0].src += "&autoplay=1";
					ev.preventDefault();
					$("#videoPoster").removeClass('d-flex').addClass('d-none');
				});
			});
			</script>

		</section>
		<section class="branco-bg padding-bottom-xlarge padding-top-xlarge">
			<div class="custom-container">
				<div class="row">
					<div class="col-12 col-lg-8 offset-lg-2">
						<h1 class="text-center margin-bottom-xsmall"><?php the_field('titulo') ?></h1>
						<p><?php the_field('intro') ?></p>
					</div>
				</div>
			</div>
		</section>
		<?php
			get_template_part( 'partials/slider', 'testimonials' );
			get_template_part( 'partials/join-us' );
		?>
    </main>

<?php endwhile; ?>

<?php
    get_template_part( 'partials/footer' );
?>

<?php endif; ?>
