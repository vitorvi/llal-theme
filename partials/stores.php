<?php
/**
 * Stores Section
 *
 * @package LLAL
 */
?>

<?php
    if (get_field('banner_lojas')) :
        $banner = get_field('banner_lojas');
    endif;
    if (get_field('capa_lojas')) :
        $banner = get_field('capa_lojas');
    endif;
?>

<section class="stores amarelo-bg d-flex flex-column justify-content-center">
    <div class="stores-cover">
      <svg viewBox="0 0 800 800" fill="none" xmlns="http://www.w3.org/2000/svg" class="cover-desktop d-none d-md-block">
        <defs>
          <pattern id="img_lojas" patternUnits="userSpaceOnUse" width="115%" height="115%">
            <image xlink:href="<?php echo wp_get_attachment_url($banner['imagem'], 'large'); ?>" x="-7.5%" y="-7.5%" width="115%" height="115%"  />
          </pattern>
        </defs>
        <path fill="url(#img_lojas)" d="M487.463 0L742.69 149.354C778.186 170.125 800 208.166 800 249.293L800 550.707C800 591.834 778.186 629.875 742.69 650.646L487.463 800H0L0 0L487.463 0Z" />
        <path d="M484.366 777.286L725.117 636.466C758.598 616.882 779.175 581.015 779.175 542.238V258.048C779.175 219.271 758.598 183.403 725.116 163.819L484.366 23" stroke="white" stroke-width="2"/>
      </svg>
      <svg viewBox="0 0 360 260" fill="none" xmlns="http://www.w3.org/2000/svg" class="cover-mobile d-block d-md-none">
        <pattern id="img_lojas_mobile" patternUnits="userSpaceOnUse" width="115%" height="115%">
          <image xlink:href="<?php echo wp_get_attachment_url($banner['imagem'], 'large'); ?>" x="-7.5%" y="-7.5%" width="115%" height="115%"  />
        </pattern>
        <g clip-path="url(#clip0)">
          <path fill="url(#img_lojas_mobile)" d="M213.553 250.885L360 165.011V0L0 0L0 165.011L146.447 250.885C167.172 263.038 192.828 263.038 213.553 250.885Z" fill="#C4C4C4"/>
          <path d="M0 145.011L146.447 230.885C167.172 243.038 192.828 243.038 213.553 230.885L360 145.011" stroke="white" stroke-width="3" stroke-linecap="square"/>
        </g>
        <defs>
          <clipPath id="clip0">
            <rect width="360" height="260"/>
          </clipPath>
        </defs>
      </svg>
    </div>
    <div class="custom-container">
        <div class="row">
            <div class="col-12 col-md-5 offset-md-7 padding-top-large padding-bottom-large">
                <h2 class="h1 lilas margin-bottom-small"><?php echo $banner['titulo'] ?></h2>
                <p class="marrom"><?php echo $banner['intro'] ?></p>
                <?php if (array_key_exists('link', $banner)) : ?>
                    <a class="btn button-large margin-top-medium lilas" href="<?php echo $banner['link'] ?>">
                        <?php echo $banner['chamada'] ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
