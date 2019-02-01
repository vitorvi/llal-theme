<?php
/**
 * Stores Section
 *
 * @package LLAL
 */
?>

<?php
  $postsPerPage = -1;
  $postType = 'loja';
  $order = 'desc';
  $query_args = array(
    'posts_per_page' => $postsPerPage,
    'post_type' => $postType,
    'order' => $order,
    'post_status' => 'publish'
  );
  $posts_query = new WP_Query( $query_args );
  if ($posts_query -> have_posts()) :
      $cases_count = wp_count_posts('loja')->publish;
?>

  <section class="stores-search branco-bg">
      <div class="custom-container">
          <div class="row">
              <div class="col-12 col-md-5 padding-top-medium padding-bottom-large">
                <div class="dropdown w-100 margin-bottom-xsmall" id="dropdownFranquias">
                  <button class="btn lilas dropdown-toggle w-100 text-left" type="button" id="botaoFranquias" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Escolha uma franquia
                  </button>
                  <div class="dropdown-menu" aria-labelledby="botaoFranquias">
                    <a class="dropdown-item h5" href="#" data-franquia="todas" >Todas</a>
                    <a class="dropdown-item h5" href="#" data-franquia="qdb" >Quem disse, Berenice?</a>
                    <a class="dropdown-item h5" href="#" data-franquia="boticario" >O Boticário</a>
                  </div>
                </div>
                <ul id="listaLojas">
                  <?php $i = 1; while ($posts_query -> have_posts()) : $posts_query -> the_post(); ?>
                    <li class="loja h5" id="loja_<?php echo $i ?>" data_franquia="<?php the_field('franquia'); ?>"><?php the_title(); ?></li>
                    <?php $i++; endwhile; wp_reset_postdata(); ?>
                </ul>
              </div>
          </div>
      </div>
      <div id="map"></div>
  </section>

  <?php
    $teste = 'Taguatinga Shopping';
  ?>

  <script type="text/javascript">
    window.onload = function () {
      mapboxgl.accessToken = 'pk.eyJ1IjoibGFib3VsYW5nZXJpZSIsImEiOiJjamZtcTVwMnUxM2JtMzBwbzhxaDE0MzRvIn0.IR-XQlIH_92_ZhqwsFwDhw';
      const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/laboulangerie/cjrkwgeqh0qs32sob15q8sc1g',
        center: [-47.938,-15.796],
        zoom: 11
      });

      var $data_qdb =
      {
        "type": "FeatureCollection",
        "features": [
          <?php $i = 1; while ($posts_query -> have_posts()) : $posts_query -> the_post(); if (get_field('franquia') == 'qdb') : ?>
            {
              "type": "Feature",
              "properties": {
                "Nome": "<?php the_title(); ?>",
                "Franquia": "<?php the_field('franquia'); ?>",
                "Telefone": "<?php the_field('telefone'); ?>",
                "Email": "<?php the_field('email'); ?>",
                "Gerente": "<?php the_field('gerente'); ?>",
                "Link": "<?php the_field('link_mapa'); ?>",
                "icon": "marcador_loja"
              },
              "geometry": {
                "coordinates": [
                  "<?php the_field('latitude'); ?>",
                  "<?php the_field('longitude'); ?>"
                ],
                "type": "Point"
              },
              "id": "<?php echo $i; ?>"
            },
          <?php endif; $i++; endwhile; wp_reset_postdata(); ?>
        ]
      }

      var $data_boticario =
      {
        "type": "FeatureCollection",
        "features": [
          <?php $i = 1; while ($posts_query -> have_posts()) : $posts_query -> the_post(); if (get_field('franquia') == 'boticario') : ?>
            {
              "type": "Feature",
              "properties": {
                "Nome": "<?php the_title(); ?>",
                "Franquia": "<?php the_field('franquia'); ?>",
                "Telefone": "<?php the_field('telefone'); ?>",
                "Email": "<?php the_field('email'); ?>",
                "Gerente": "<?php the_field('gerente'); ?>",
                "Link": "<?php the_field('link_mapa'); ?>",
                "icon": "marcador_loja"
              },
              "geometry": {
                "coordinates": [
                  "<?php the_field('latitude'); ?>",
                  "<?php the_field('longitude'); ?>"
                ],
                "type": "Point"
              },
              "id": "<?php echo $i; ?>"
            },
          <?php endif; $i++; endwhile; wp_reset_postdata(); ?>
        ]
      }

      var $data_todas =
      {
        "type": "FeatureCollection",
        "features": [
          <?php $i = 1; while ($posts_query -> have_posts()) : $posts_query -> the_post(); ?>
            {
              "type": "Feature",
              "properties": {
                "Nome": "<?php the_title(); ?>",
                "Franquia": "<?php the_field('franquia'); ?>",
                "Telefone": "<?php the_field('telefone'); ?>",
                "Email": "<?php the_field('email'); ?>",
                "Gerente": "<?php the_field('gerente'); ?>",
                "Link": "<?php the_field('link_mapa'); ?>",
                "icon": "marcador_loja"
              },
              "geometry": {
                "coordinates": [
                  "<?php the_field('latitude'); ?>",
                  "<?php the_field('longitude'); ?>"
                ],
                "type": "Point"
              },
              "id": "<?php echo $i; ?>"
            },
          <?php $i++; endwhile; wp_reset_postdata(); ?>
        ]
      }

      var $current_filter =
      {
        "type": "FeatureCollection",
        "features": []
      }

      $current_filter.features = $data_todas.features;

      $("#dropdownFranquias .dropdown-item").click( function(event){
        event.preventDefault();
        map.flyTo({center: [-47.938,-15.796], zoom: 11});
        if($(this).data('franquia') == "todas") {
          $("#botaoFranquias").text("Escolha uma franquia");
          var popups = $('.mapboxgl-popup');
          popups.remove();

          $current_filter.features = $data_todas.features;

          var boundingBox = [[map.getBounds()._sw.lng, map.getBounds()._sw.lat], [map.getBounds()._ne.lng, map.getBounds()._ne.lat]];

          map.setLayoutProperty('lojas_boticario', 'visibility', 'none');
          map.setLayoutProperty('lojas_qdb', 'visibility', 'none');

          map.setLayoutProperty('lojas_todas', 'visibility', 'visible');

          $('#listaLojas .loja').removeClass('d-none');

        } else {
          $("#botaoFranquias").text($(this).text());
          var popups = $('.mapboxgl-popup');
          popups.remove();
          if ($(this).data('franquia') == "qdb") {
            $current_filter.features = $data_qdb.features;

            map.setLayoutProperty('lojas_boticario', 'visibility', 'none');
            map.setLayoutProperty('lojas_todas', 'visibility', 'none');

            map.setLayoutProperty('lojas_qdb', 'visibility', 'visible');

            $('#listaLojas .loja').addClass('d-none');
            $('#listaLojas .loja[data_franquia=qdb]').removeClass('d-none');

          } else if ($(this).data('franquia') == "boticario") {
            $current_filter.features = $data_boticario.features;

            map.setLayoutProperty('lojas_qdb', 'visibility', 'none');
            map.setLayoutProperty('lojas_todas', 'visibility', 'none');

            map.setLayoutProperty('lojas_boticario', 'visibility', 'visible');

            $('#listaLojas .loja').addClass('d-none');
            $('#listaLojas .loja[data_franquia=boticario]').removeClass('d-none');
          }
        }
      });

      map.on('load', function () {
        var header_height = $('.page-header').outerHeight();
        map.addLayer(
          {
            "id": "lojas_todas",
            "type": "symbol",
            "source": {
                "type": "geojson",
                "data": $data_todas
            },
            "layout": {
                "icon-image": "{icon}",
                "icon-allow-overlap": true
            }
          }
        );
        map.addLayer(
          {
            "id": "lojas_qdb",
            "type": "symbol",
            "source": {
                "type": "geojson",
                "data": $data_qdb
            },
            "layout": {
                "icon-image": "{icon}",
                "icon-allow-overlap": true
            }
          }
        );
        map.addLayer(
          {
            "id": "lojas_boticario",
            "type": "symbol",
            "source": {
                "type": "geojson",
                "data": $data_boticario
            },
            "layout": {
                "icon-image": "{icon}",
                "icon-allow-overlap": true
            }
          }
        );

        map.setLayoutProperty('lojas_boticario', 'visibility', 'none');
        map.setLayoutProperty('lojas_qdb', 'visibility', 'none');

        map.on('click', 'lojas_todas', function (e) {
          var popups = $('.mapboxgl-popup');
          popups.remove();
          var popupNome = '<h4 class="margin-bottom-micro">' + e.features[0].properties.Nome + '</h4>';
          var popupTel = '<p class="text-small">telefone: ' + e.features[0].properties.Telefone + '</p>';
          var popupEmail = '<p class="text-small">e-mail: ' + e.features[0].properties.Email + '</p>';
          var popupGerente = '<p class="text-small">gerente: ' + e.features[0].properties.Gerente + '</p>';
          var popupLink = '<a class="link" href="' + e.features[0].properties.Link + '" target="_blank">Rotas</a>';
          new mapboxgl.Popup()
            .setLngLat(e.features[0].geometry.coordinates)
            .setHTML(popupNome + popupTel + popupEmail + popupGerente + popupLink )
            .addTo(map);

          map.flyTo({center: e.features[0].geometry.coordinates});

        });

        map.on('mouseenter', 'lojas_todas', function () {
            map.getCanvas().style.cursor = 'pointer';
        });

        map.on('mouseleave', 'lojas_todas', function () {
            map.getCanvas().style.cursor = '';
        });

        $('#listaLojas .loja').click(function(){
          $('html, body').animate({
            scrollTop: $("#map").offset().top - header_height
          }, 1000);
          var popups = $('.mapboxgl-popup');
          popups.remove();
          var id = $(this).attr('id').replace('loja_','');
          for (var i = 0; i < $current_filter.features.length; i++){
            if ( $current_filter.features[i].properties.Telefone == null ) { var popupTel = '' } else {
              var popupNome = '<h4 class="margin-bottom-micro">' + $current_filter.features[i].properties.Nome + '</h4>';
              var popupTel = '<p class="text-small">telefone: ' + $current_filter.features[i].properties.Telefone + '</p>';
              var popupEmail = '<p class="text-small">e-mail: ' + $current_filter.features[i].properties.Email + '</p>';
              var popupGerente = '<p class="text-small">gerente: ' + $current_filter.features[i].properties.Gerente + '</p>';
              var popupLink = '<a class="link" href="' + $current_filter.features[i].properties.Link + '" target="_blank">Rotas</a>';
            }
            if ($current_filter.features[i].id == id){
              map.flyTo({center: $current_filter.features[i].geometry.coordinates});
              new mapboxgl.Popup()
                .setLngLat($current_filter.features[i].geometry.coordinates)
                .setHTML(popupNome + popupTel + popupEmail + popupGerente + popupLink )
                .addTo(map);
            }
          }
        });

      });
    }
  </script>

<?php endif; ?>
