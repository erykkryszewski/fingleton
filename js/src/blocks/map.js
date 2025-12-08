import $ from 'jquery';

(function($) {
  function initMap($el) {
    var $markers = $el.find('.map-snazzy__marker');
    window.markers_url = $el.data('marker-url');
    var mapArgs = {
      zoom: $el.data("zoom") || 7,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: [
        {"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},
        {"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},
        {"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},
        {"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},
        {"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},
        {"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},
        {"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},
        {"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},
        {"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},
        {"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},
        {"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},
        {"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},
        {"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},
        {"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
        {"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},
        {"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},
        {"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
        {"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}
      ]
    };

    var map = new google.maps.Map($el[0], mapArgs);

    map.markers = [];
    $markers.each(function() {
      initMarker($(this), map);
    });

    centerMap(map);

    return map;
  }

  function initMarker($marker, map) {
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var latLng = {
      lat: parseFloat(lat),
      lng: parseFloat(lng)
    };
  
    // Check for a custom marker URL
    var iconUrl = $marker.data('marker-url') || window.markers_url;
  
    // Check for custom marker size
    var markerWidth = $marker.data('marker-width') ? parseInt($marker.data('marker-width')) : 40;
    var markerHeight = $marker.data('marker-height') ? parseInt($marker.data('marker-height')) : 40;
  
    var marker = new google.maps.Marker({
      position: latLng,
      map: map,
      icon: {
        url: iconUrl,
        scaledSize: new google.maps.Size(markerWidth, markerHeight)
      }
    });
  
    map.markers.push(marker);
  
    if ($marker.html()) {
      var infowindow = new google.maps.InfoWindow({
        content: $marker.html()
      });
  
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
      });
    }
  }  
  
  function centerMap(map) {
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function(marker) {
      bounds.extend({
        lat: marker.position.lat(),
        lng: marker.position.lng()
      });
    });

    if (map.markers.length === 1) {
      map.setCenter(bounds.getCenter());
    } else {
      map.fitBounds(bounds);
    }
  }

  $(document).ready(function() {
    let maps = $('.map-snazzy');
    maps.each(function() {
      var map = initMap($(this));
    });
  });
})(jQuery);
