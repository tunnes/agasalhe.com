function initMap() {
    var map_style = [
    {
     "featureType": "all",
     "elementType": "labels.text.fill",
     "stylers": [
         { "saturation": 36},
         { "color": "#000000"},
         { "lightness": 40}
     ]},
    {"featureType": "all",
     "elementType": "labels.text.stroke",
     "stylers": [
         {"visibility": "on"},
         {"color": "#000000"},
         {"lightness": 16}
     ]
    },
    {"featureType": "all",
     "elementType": "labels.icon",
     "stylers": [{"visibility": "off"}]
    },
    {"featureType": "administrative",
     "elementType": "geometry.fill",
     "stylers": [
         { "color": "#000000"},
         {"lightness": 20}
     ]
    },
    {
     "featureType": "administrative",
     "elementType": "geometry.stroke",
     "stylers": [
         {"color": "#000000"},
         {"lightness": 17},
         {"weight": 1.2}
     ]
    },
    {"featureType": "landscape",
     "elementType": "geometry",
     "stylers": [
         {"color": "#000000"},
         {"lightness": 20}
     ]
    },
    {"featureType": "poi",
     "elementType": "geometry",
     "stylers": [
         {"color": "#000000"},
         {"lightness": 21}
     ]
    },
    {"featureType": "road.highway",
     "elementType": "geometry.fill",
     "stylers": [
         {"color": "#000000"},
         {"lightness": 17}
     ]
    },
    {
     "featureType": "road.highway",
     "elementType": "geometry.stroke",
     "stylers": [
         {"color": "#000000"},
         {"lightness": 29},
         {"weight": 0.2}
     ]
    },
    {
     "featureType": "road.arterial",
     "elementType": "geometry",
     "stylers": [
         {
             "color": "#000000"
         },
         {
             "lightness": 18
         }
     ]
    },
    {
     "featureType": "road.local",
     "elementType": "geometry",
     "stylers": [
         {
             "color": "#000000"
         },
         {
             "lightness": 16
         }
     ]
    },
    {
     "featureType": "transit",
     "elementType": "geometry",
     "stylers": [
         {
             "color": "#000000"
         },
         {
             "lightness": 19
         }
     ]
    },
    {
     "featureType": "water",
     "elementType": "geometry",
     "stylers": [
         {
             "color": "#000000"
         },
         {
             "lightness": 17
         }
     ]
    }
    ];
      var fatec = {lat: -23.980404, lng: -46.311456}
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        styles: map_style,
        center: fatec,
        disableDefaultUI: true
      });
      var marker = new google.maps.Marker({
        position: fatec,
        map: map,
        icon: "/application/assets/img/map-marker.png"
      });
}
$( document ).ready(function(){
 
 
	$('.button-collapse').sideNav();
    var $grid = $('.grid').imagesLoaded( function() {
     	$grid.masonry({
         	itemSelector: '.grid-item',
         	percentPosition: true,
         	columnWidth: '.grid-sizer'
     	}); 
	});
	
	var options = {
 	data: countries,
 	getValue: "name",
 
 	list: {
 		match: {
 			enabled: true
 		},
 		
 	onSelectItemEvent: function() {
 			var country = $("#country").getSelectedItemData().code;
 			console.log(country);
		},
		
		showAnimation: {
			type: "fade", //normal|slide|fade
			time: 500,
			callback: function() {}
		},

		hideAnimation: {
			type: "slide", //normal|slide|fade
			time: 500,
			callback: function() {}
		}
		
 	}
 };
 $("#country").easyAutocomplete(options);
	 
})