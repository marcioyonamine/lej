var map;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

function initialize() {	
	directionsDisplay = new google.maps.DirectionsRenderer();
	var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
	
    var options = {
        zoom: 5,
		center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("mapa"), options);
	directionsDisplay.setMap(map);
	directionsDisplay.setPanel(document.getElementById("trajeto-texto"));
	
	//if (navigator.geolocation) {
	//	navigator.geolocation.getCurrentPosition(function (position) {

	//		pontoPadrao = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	//		map.setCenter(pontoPadrao);
			
	//		var geocoder = new google.maps.Geocoder();
			
	//		geocoder.geocode({
	//			"location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
     //       },
     //       function(results, status) {
	//			if (status == google.maps.GeocoderStatus.OK) {
	//				$("#txtEnderecoPartida").val(results[0].formatted_address);
	//			}
     //       });
	//	});
	//}
}

initialize();

$(".form_mapas").submit(function(event) {
	event.preventDefault();
	
	var enderecoPartida = $("#txtEnderecoPartida").val();
	var enderecoChegada = $("#txtEnderecoChegada").val();
	var enderecoMeio01 = $("#txtEnderecoMeio01").val();
	var enderecoMeio02 = $("#txtEnderecoMeio02").val();
	var enderecoMeio03 = $("#txtEnderecoMeio03").val();	
	var enderecoMeio04 = $("#txtEnderecoMeio04").val();
	var enderecoMeio05 = $("#txtEnderecoMeio05").val();		

	if (enderecoMeio01 == ""){
		var request = {
			origin: enderecoPartida,
			destination: enderecoChegada,
			travelMode: google.maps.TravelMode.DRIVING
		};
	}

	else
	{
		var request = {
			origin: enderecoPartida,
			destination: enderecoChegada,
			 waypoints: [{location: enderecoMeio01}],
			travelMode: google.maps.TravelMode.DRIVING
		};
	}

	if (enderecoMeio02 != ""){
		var request = {
			origin: enderecoPartida,
			destination: enderecoChegada,
    		 waypoints: [{location: enderecoMeio01},{location: enderecoMeio02}],
			travelMode: google.maps.TravelMode.DRIVING
		};
	}	
	
		if (enderecoMeio02 != ""){
		var request = {
			origin: enderecoPartida,
			destination: enderecoChegada,
    		 waypoints: [{location: enderecoMeio01},{location: enderecoMeio02}],
			travelMode: google.maps.TravelMode.DRIVING
		};
	}
	
		if (enderecoMeio03 != ""){
		var request = {
			origin: enderecoPartida,
			destination: enderecoChegada,
    		 waypoints: [{location: enderecoMeio01},{location: enderecoMeio02},{location: enderecoMeio03}],
			travelMode: google.maps.TravelMode.DRIVING
		};
	}
	
		if (enderecoMeio04 != ""){
		var request = {
			origin: enderecoPartida,
			destination: enderecoChegada,
    		 waypoints: [{location: enderecoMeio01},{location: enderecoMeio02},{location: enderecoMeio03},{location: enderecoMeio04}],
			travelMode: google.maps.TravelMode.DRIVING
		};
	}
	
		if (enderecoMeio05 != ""){
		var request = {
			origin: enderecoPartida,
			destination: enderecoChegada,
    		 waypoints: [{location: enderecoMeio01},{location: enderecoMeio02},{location: enderecoMeio03},{location: enderecoMeio04},{location: enderecoMeio05}],
			travelMode: google.maps.TravelMode.DRIVING
		};
	}
	
	directionsService.route(request, function(result, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			directionsDisplay.setDirections(result);
		}
	});
});

$(".form_envia").submit(function(event) {
	var enderecoPartida = $("#txtEnderecoPartida").val();
	var enderecoChegada = $("#txtEnderecoChegada").val();
	$("#partida").val(enderecoPartida);
	$("#chegada").val(enderecoChegada);
});


