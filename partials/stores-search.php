<?php
/**
 * Stores Section
 *
 * @package LLAL
 */
?>

<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.42.2/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.42.2/mapbox-gl.css' rel='stylesheet' />

<section class="stores-search branco-bg">
    <div class="custom-container">
        <div class="row">
            <div class="col-12 col-lg-5 padding-top-medium padding-bottom-large">
              <p>http://www.grupollal.dev.cc/wp-content/themes/llal-theme/acf-json/group_5c23f127678e3.json</p>
              <ul id="listaLojas"></ul>
            </div>
        </div>
    </div>
    <div id="map"></div>
</section>

<script type="text/javascript">
  window.onload = function () {
    mapboxgl.accessToken = 'pk.eyJ1IjoidnRybXJ4IiwiYSI6ImNpcDd2M3AxOTAxNnBzdmx5bWk4cTB4MjUifQ.pwa66A8LAj4Q-d8Fdg4k1Q';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/vtrmrx/cj26z1lh3000a2smwt3x0jlqw',
        // zoom: 13,
        // center: [4.899, 52.372]
    });

    var $data =
    {
      "type": "FeatureCollection",
      "features": [
        {
          "type": "Feature",
          "properties": {
            "Nome": "Taguatinga Shopping",
            "Franquia": "boticario",
            "Telefone": "61 3030 3030",
            "Email": "mail@mail.com",
            "Gerente": "Fulana de Tal",
            "Link": "https://maps.google.com",
            "icon": "marcador_quiosque"
          },
          "geometry": {
            "coordinates": [
              "-48.0459565",
              "-15.8418531"
            ],
            "type": "Point"
          },
          "id": "1"
        },
        {
          "type": "Feature",
          "properties": {
            "Nome": "Iguatemi",
            "Franquia": "qdb",
            "Telefone": "61 3030 3030",
            "Email": "mail@mail.com",
            "Gerente": "Fulana de Tal",
            "Link": "https://maps.google.com",
            "icon": "marcador_quiosque"
          },
          "geometry": {
            "coordinates": [
              "-47.8880087",
              "-15.720366"
            ],
            "type": "Point"
          },
          "id": "2"
        },
        {
          "type": "Feature",
          "properties": {
            "Nome": "Samdu Sul",
            "Franquia": "qdb",
            "Telefone": "61 3030 3030",
            "Email": "mail@mail.com",
            "Gerente": "Fulana de Tal",
            "Link": "https://maps.google.com",
            "icon": "marcador_quiosque"
          },
          "geometry": {
            "coordinates": [
              "-48.0501918",
              "-15.8484685"
            ],
            "type": "Point"
          },
          "id": "3"
        },
      ]
    }
    map.on('load', function () {
      var header_height = $('.page-header').outerHeight();
      map.addLayer(
        {
          "id": "lojas_de_venda",
          "type": "symbol",
          "source": {
              "type": "geojson",
              "data": $data
          },
          "layout": {
              "icon-image": "{icon}",
              "icon-allow-overlap": true
          }
        }
      );

      map.on('click', 'lojas_de_venda', function (e) {
        var popups = $('.mapboxgl-popup');
        popups.remove();
        var popupNome = '<h4>' + e.features[0].properties.Nome + '</h4>';
        var popupTel = '<p class="text-small">telefone: ' + e.features[0].properties.Telefone + '</p>';
        var popupEmail = '<p class="text-small">e-mail: ' + e.features[0].properties.Email + '</p>';
        var popupGerente = '<p class="text-small">gerente: ' + e.features[0].properties.Gerente + '</p>';
        var popupLink = '<a href="' + e.features[0].properties.Link + '" target="_blank">Rotas</a>';
        new mapboxgl.Popup()
          .setLngLat(e.features[0].geometry.coordinates)
          .setHTML(popupNome + popupTel + popupEmail + popupGerente + popupLink )
          .addTo(map);

        map.flyTo({center: e.features[0].geometry.coordinates});

      });

      map.on('mouseenter', 'lojas_de_venda', function () {
          map.getCanvas().style.cursor = 'pointer';
      });

      map.on('mouseleave', 'lojas_de_venda', function () {
          map.getCanvas().style.cursor = '';
      });

        var lojas = $data;
        var container_lojas = $( "#listaLojas" );

        for( var feature in lojas.features ) {
          var feature = lojas.features[feature];
          if ( feature.id == null ) { var id = '' } else {
            var id = feature.id;
          }
          if ( feature.properties.Nome == null ) { var nome = '' } else {
            var nome = feature.properties.Nome;
          }

          container_lojas.append('<li class="loja h5" id="loja_' + id + '">' + nome + '</li>');

        }

        $('.loja').click(function(){

          $('html, body').animate({
            scrollTop: $("#map").offset().top - header_height
          }, 1000);

          var popups = $('.mapboxgl-popup');
          popups.remove();

          var id = $(this).attr('id').replace('loja_','');

          for (var i = 0; i < lojas.features.length; i++){
            if ( lojas.features[i].properties.Telefone == null ) { var popupTel = '' } else {
              var popupNome = '<h4>' + lojas.features[i].properties.Nome + '</h4>';
              var popupTel = '<p class="text-small">telefone: ' + lojas.features[i].properties.Telefone + '</p>';
              var popupEmail = '<p class="text-small">e-mail: ' + lojas.features[i].properties.Email + '</p>';
              var popupGerente = '<p class="text-small">gerente: ' + lojas.features[i].properties.Gerente + '</p>';
              var popupLink = '<a href="' + lojas.features[i].properties.Link + '" target="_blank">Rotas</a>';
            }
            if (lojas.features[i].id == id){
              map.flyTo({center: lojas.features[i].geometry.coordinates});
              new mapboxgl.Popup()
                .setLngLat(lojas.features[i].geometry.coordinates)
                .setHTML(popupNome + popupTel + popupEmail + popupGerente + popupLink )
                .addTo(map);
            }
          }
        });

    });
  }
</script>
