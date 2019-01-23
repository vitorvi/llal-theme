function displayPost(response, postType) {
  console.log(postType);
  console.log(response);

  if (postType == 'post') {
    $("#ajaxContainer").append($('<div class="col-12 col-md-6 col-xl-4 margin-bottom-xsmall">')
          .append($('<a class="item">').attr('href', response.permalink)
              .append($('<article class="post-thumb card visible">')
                  .append($('<figure>')
                      .append($('<img>').attr('src', response.thumb))
                  )
                  .append($('<div class="post-info">')
                      .append($('<h1 class="h6">').text(response.title))
                      .append($('<div class="post-excerpt margin-top-micro preto-70">').text(response.excerpt))
                  )
              )
          )
      );
  }
}

jQuery(function($){

    $('#more_posts').on('click', function(e){
        e.preventDefault();
         var $offset = $('#more_posts').attr('data-offset');
         var $category = $('#more_posts').attr('data-category');
         var $post_type = $(this).data('post-type');
         var $ppp = $(this).data('ppp');
         var $order = $(this).data('order');
         console.log($post_type);
        $.ajax({
            method: 'POST',
            url: ajax_object.ajax_url,
            type: 'JSON',
            data: {
                offset: $offset,
                action: 'more_posts',
                post_type: $post_type,
                ppp: $ppp,
                order: $order,
                category: $category
            },
            success: function(response) {
                $('#more_posts').attr('data-offset', parseInt(response.data.offset));
                $.each(response.data.posts, function( index, value ) {
                  displayPost(this, $post_type);
                });
                $('#ajaxContainer .card:not(.visible)').addClass('visible');
                $('#more_posts').css('pointer-events', 'all');
                $offset = $('#more_posts').attr('data-offset');
                if ($offset >= parseInt(response.data.posts_count)) {
                    $('#more_posts').removeClass('d-inline-block').addClass('d-none');
                }
            }
        });
    })

    $('.filter_posts').on('click', function(e){
        console.log("filter post type!")
        e.preventDefault();
        var $offset = 0;
        var $ppp = $('#more_posts').attr('data-ppp');
        var $category = $(this).data('post-category');
        var $post_type = $(this).data('post-type');
        $.ajax({
            method: 'POST',
            url: ajax_object.ajax_url,
            type: 'JSON',
            data: {
                offset: $offset,
                ppp: $ppp,
                post_type: $post_type,
                category: $category,
                action: 'filter_posts'
            },
            success:function(response){
                console.log($category);
                $('.filter_posts').removeClass('active');
                $(e.target).addClass('active');

                $("#more_posts").attr('data-category', $category).removeClass('d-none').addClass('d-inline-block');

                $('#more_posts').attr('data-offset', $ppp);

                $("#ajaxContainer").empty();
                $.each(response.data.materials, function( index, value ) {
                  $("#ajaxContainer")
                    .append(
                        $('<article class="col-12 col-md-6 col-lg-4 margin-bottom-xsmall">')
                        .append(
                            $('<a class="d-block material bg-cover" target="_blank">').attr('href', this.arquivo).attr('style', 'background-image: url(' + this.thumb + ')')
                            .append(
                                $('<div class="material-overlay">')
                                .append(
                                    $(' <div class="overlay-content d-flex flex-column align-items-center justify-content-center">')
                                    .append(
                                        $('<p class="tag text-center recursos">').text(this.categories)
                                    )
                                    .append(
                                        $('<h2 class="title h4 text-center branco">').text(this.title)
                                    )
                                    .append(
                                        $('<div class="appended-icon">')
                                        .append(
                                            $('<svg class="icon margin-top-xsmall" width="42" height="56" viewBox="0 0 42 56" fill="none" xmlns="http://www.w3.org/2000/svg">')
                                            .append(
                                                $('<path class="caixa" d="M27 16V18H40V54H2V18H14V16H0V56H42V16L27 16Z" fill="white"/>')
                                            )
                                            .append(
                                                $('<path class="seta" d="M13 30L11.5 31.5L21 41L30.5 31.5L29 30L22 37V0H20V37L13 30Z" fill="white"/>')
                                            )
                                        )
                                    )
                                )
                            )
                        )
                    );
                });
                $("#ajaxContainer .appended-icon").html($("#ajaxContainer .appended-icon").html());
                $offset = $('#more_posts').attr('data-offset');
                if ($offset >= parseInt(response.data.posts_count)) {
                    $('#more_posts').removeClass('d-inline-block').addClass('d-none');
                }
            }
        });
    });

});
