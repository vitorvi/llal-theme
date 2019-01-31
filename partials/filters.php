<?php
/**
 * Archive Filters
 *
 * @package LLAL
 */
?>

<section class="branco-bg filters border-bottom-cinza padding-top-small padding-bottom-small">
    <div class="custom-container">
        <div class="row">
            <div class="col-12 d-flex flex-row justify-content-center flex-wrap">
                <a class="tag-large cinza-4 cinza-4-bg filter filter_posts active" data-post-type="post" data-post-category="">Todos</a>
                <?php
                    $categories = get_terms( array(
                        'taxonomy' => 'category',
                        'hide_empty' => false,
                    ) );
                    foreach($categories as $term){
                        if( 0 != $term->count ):
                            $cor = get_field('cor', 'category_' . $term->term_id );
                ?>
                    <a class="tag-large <?php echo $cor ?> <?php echo $cor ?>-bg filter filter_posts" data-post-type="post" data-category="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                <?php endif; }?>
            </div>
        </div>
    </div>
</section>
