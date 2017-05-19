var geocoder02;
var map02;
var marker02;

function initialize() {
	var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
	var options = {
		zoom: 5,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	
	map = new google.maps.Map(document.getElementById("mapa02"), options);
	
	geocoder = new google.maps.Geocoder();
	
	marker02 = new google.maps.Marker({
		map02: map02,
		draggable: true,
	});
	
	marker02.setPosition(latlng);
}

$(document).ready(function () {

	initialize();
	
	function carregarNoMapa(endereco) {
		geocoder02.geocode({ 'address': endereco + ', Brasil', 'region': 'BR' }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {
					var latitude = results[0].geometry.location.lat();
					var longitude = results[0].geometry.location.lng();
		
					$('#txtEndereco02').val(results[0].formatted_address);
					$('#txtLatitude02').val(latitude);
                   	$('#txtLongitude02').val(longitude);
		
					var location = new google.maps.LatLng(latitude, longitude);
					marker02.setPosition(location);
					map02.setCenter(location);
					map02.setZoom(16);
				}
			}
		})
	}
	
	$("#btnEndereco02").click(function() {
		if($(this).val() != "")
			carregarNoMapa($("#txtEndereco02").val());
	})
	
	$("#txtEndereco").blur(function() {
		if($(this).val() != "")
			carregarNoMapa($(this).val());
	})
	
	google.maps.event.addListener(marker02, 'drag', function () {
		geocoder02.geocode({ 'latLng': marker02.getPosition() }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {  
					$('#txtEndereco02').val(results[0].formatted_address);
					$('#txtLatitude02').val(marker02.getPosition().lat());
					$('#txtLongitude02').val(marker02.getPosition().lng());
				}
			}
		});
	});
	
	$("#txtEndereco").autocomplete({
		source: function (request, response) {
			geocoder02.geocode({ 'address': request.term + ', Brasil', 'region': 'BR' }, function (results, status) {
				response($.map02(results, function (item) {
					return {
						label: item.formatted_address,
						value: item.formatted_address,
						latitude: item.geometry.location.lat(),
          				longitude: item.geometry.location.lng()
					}
				}));
			})
		},
		select: function (event, ui) {
			$("#txtLatitude02").val(ui.item.latitude);
    		$("#txtLongitude02").val(ui.item.longitude);
			var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
			marker02.setPosition(location);
			map02.setCenter(location);
			map02.setZoom(16);
		}
	});
	
	$("form").submit(function(event) {
		//event.preventDefault();
		
		var endereco = $("#txtEndereco02").val();
		var latitude = $("#txtLatitude02").val();
		var longitude = $("#txtLongitude02").val();
		
		//alert("Endereço: " + endereco + "\nLatitude: " + latitude + "\nLongitude: " + longitude);
	});

});