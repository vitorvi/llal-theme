<?php
/**
 * Video Cover
 *
 * @package LLAL
 */
?>

<section class="turquesa-bg position-relative video-cover">

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
  </style>

  <div class="embed-container">
    <?php echo $iframe; ?>
  </div>

  <section id="videoPoster" class="d-flex flex-column justify-content-center">
    <?php echo wp_get_attachment_image(get_field('capa'), 'full', "", array( "class" => "poster" )); ?>
    <button id="playVideo" type="button" class="play-button" data-toggle="modal" data-target="#homeCoverVideo">
      <svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg" style="width: 4rem">
        <circle cx="60" cy="60" r="58" stroke-linejoin="round"/>
          <path d="M89.8579 61.2157L43.9226 36.897V85.5343L89.8579 61.2157Z" stroke-linejoin="round"/>
      </svg>
    </button>
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
