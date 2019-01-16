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

<section class="stores amarelo-bg">
    <div class="custom-container">
        <div class="row">
            <div class="col-12 col-lg-5 offset-lg-7 padding-top-xlarge padding-bottom-xlarge">
                <h2><?php echo $banner['titulo'] ?></h2>
                <p><?php echo $banner['intro'] ?></p>
                <?php if ($banner['link']) : ?>
                    <a class="btn button-large margin-top-medium" href="<?php echo $banner['link'] ?>">
                        <?php echo $banner['chamada'] ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php echo wp_get_attachment_image($banner['imagem'], 'large'); ?>
</section>
