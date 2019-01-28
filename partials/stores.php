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
    <?php echo wp_get_attachment_image($banner['imagem'], 'large', '', array( "class" => "stores-cover" )); ?>
    <div class="custom-container">
        <div class="row">
            <div class="col-12 col-lg-5 offset-lg-7 padding-top-xlarge padding-bottom-xlarge">
                <h2 class="lilas margin-bottom-xsmall"><?php echo $banner['titulo'] ?></h2>
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
