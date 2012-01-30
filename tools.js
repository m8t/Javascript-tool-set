function include (filename) {
	document.write('<script src="' + filename + '"></script>'); 
}
include ("md5.js");
include ("url_encode_decode.js");
include ("base64_encode_decode.js");
include ("utf8_encode_decode.js");

function init () {
	if (window.localStorage == null) {
		return;
	}
	var visibility = localStorage.getItem ("layer-conversion.display");
	document.getElementById("layer-conversion").style.display = visibility;
	var visibility = localStorage.getItem ("layer-network.display");
	document.getElementById("layer-network").style.display = visibility;
}

function show_hide (layer_id) {
	var display = document.getElementById(layer_id).style.display;
	if (display == "none")
		visibility = "block";
	else
		visibility = "none";
	document.getElementById(layer_id).style.display = visibility;
	if (window.localStorage != null) {
		localStorage.setItem (layer_id + ".display", visibility);
	}
}

var conversion_type;
function set_conversion_type (type) {
	conversion_type = type;
	document.getElementById('conversion-type').innerHTML = type;
}
function convert () {
	var input = document.getElementById('conversion-input').value;
	switch (conversion_type) {
		default:
		case "md5":
			var output = MD5 (input);
			break;
		case "base64_encode":
			var output = Base64.encode (input);
			break;
		case "base64_decode":
			var output = Base64.decode (input);
			break;
		case "url_encode":
			var output = Url.encode (input);
			break;
		case "url_decode":
			var output = Url.decode (input);
			break;
		case "utf8_encode":
			var output = Utf8.encode (input);
			break;
		case "utf8_decode":
			var output = Utf8.decode (input);
			break;
		case "quoted_printable_encode":
			var output = escapeToQuotedPrintable (input, 'UTF-8');
			break;
		case "quoted_printable_decode":
			var output = unescapeFromQuotedPrintable (input, 'UTF-8');
			break;
	}
	document.getElementById('conversion-output').value = output;
}

var network_type = 'dig';
function set_network_type (type) {
	network_type = type;
	document.getElementById('network-type').innerHTML = type;
}
function network () {
	var address = document.getElementById('network-address').value;
	var button = document.getElementById('network-button');
	button.disabled = true;

	var http = new XMLHttpRequest;
	http.onreadystatechange = function () {
		if (http.readyState == 4 && http.status == 200) {
			var output = http.responseText;
			document.getElementById('network-output').value = output;
			button.disabled = false;
		}
	}
	var network_type_value = encodeURIComponent (network_type)
	var address_value = encodeURIComponent (address)
	http.open ("GET", "network-tool.php?type=" + network_type_value + "&address=" + address_value, true);
	http.send (null);
}
