function displayPost(response, postType) {
  console.log(postType);
  console.log(response);

  if (postType == 'post') {
      $("#ajaxContainer").append($('<a class="col-12 col-md-2 col-lg-4">').attr('href', response.permalink)
        .append($('<article class="post-thumb slide card">')
            .append($('<figure class="margin-bottom-xsmall">')
                .append($(response.thumb))
            )
            .append($('<div class="post-info">')
                .append($('<h1 class="h4 margin-bottom-micro">')
                    .text(response.title).prepend($('<span class="tag">').addClass(response.color + '-bg').text(response.category_name))
                )
                .append($('<p class="meta text-small cinza-4">')
                    .append($('<span class="autor">').text("Por ")
                      .append($('<strong>').text(response.author))
                    )
                    .append($('<span class="data">').text(response.day + " de " + response.month))
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
         var $post_type = $(this).attr('data-post-type');
         var $ppp = $(this).attr('data-ppp');
         var $order = $(this).attr('data-order');
         console.log($post_type);
        $.ajax({
            method: 'POST',
            url: ajax_object.ajax_url,
            type: 'JSON',
            data: {
                offset: $offset,
                action: 'load_posts',
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
        var $order = $('#more_posts').attr('data-order');
        var $category = $(this).attr('data-category');
        var $post_type = $(this).attr('data-post-type');
        console.log($ppp + ' ; ' + $category + ' ; ' + $post_type);
        $.ajax({
            method: 'POST',
            url: ajax_object.ajax_url,
            type: 'JSON',
            data: {
                offset: $offset,
                ppp: $ppp,
                post_type: $post_type,
                category: $category,
                action: 'filter_posts',
                order: $order
            },
            success:function(response){
                if($category === undefined) {
                    $category = '';
                }
                $('.filter_posts').removeClass('active');
                $(e.target).addClass('active');

                $("#more_posts").attr('data-category', $category).removeClass('d-none').addClass('d-inline-block');

                $('#more_posts').attr('data-offset', $ppp);

                $("#ajaxContainer").empty();
                $.each(response.data.posts, function( index, value ) {
                  displayPost(this, $post_type);
                });
                $offset = $('#more_posts').attr('data-offset');
                if ($offset >= parseInt(response.data.posts_count)) {
                    $('#more_posts').removeClass('d-inline-block').addClass('d-none');
                }
            }
        });
    });

    $('.order_button').on('click', function(e){
        console.log("order posts!")
        e.preventDefault();
        var $offset = 0;
        var $order = $(this).attr('data-order');
        var $ppp = $('#more_posts').attr('data-ppp');
        var $category = $('#more_posts').attr('data-category');
        var $post_type = $('#more_posts').attr('data-post-type');
        console.log($ppp + ' ; ' + $category + ' ; ' + $post_type);
        $.ajax({
            method: 'POST',
            url: ajax_object.ajax_url,
            type: 'JSON',
            data: {
                offset: $offset,
                ppp: $ppp,
                post_type: $post_type,
                category: $category,
                order: $order,
                action: 'order_posts'
            },
            success:function(response){
                console.log($category);

                $("#more_posts").attr('data-category', $category).removeClass('d-none').addClass('d-inline-block');

                $('#more_posts').attr('data-offset', $ppp);
                $('#more_posts').attr('data-order', $order);

                $("#ajaxContainer").empty();
                $.each(response.data.posts, function( index, value ) {
                  displayPost(this, $post_type);
                });
                $offset = $('#more_posts').attr('data-offset');
                if ($offset >= parseInt(response.data.posts_count)) {
                    $('#more_posts').removeClass('d-inline-block').addClass('d-none');
                }
            }
        });
    });

});
