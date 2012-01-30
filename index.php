<!DOCTYPE html>
<html>
<head>
	<title>Tools</title>
	<meta charset="utf-8" />
	<script src="strutil.js"></script>
	<script src="tools.js"></script>
	<link rel="stylesheet" href="style.css" />
</head>
<body onload="init()">
	<h1>Tools</h1>

	<noscript>
	<p>Important: you need to activate Javascript for this page!</p>
	</noscript>

	<div id="guest-information">

	<p>IP: <em><?php echo (isset ($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'] ?></em><br />
	Protocol: <em><?php echo "${_SERVER['SERVER_PROTOCOL']} ${_SERVER['HTTP_CONNECTION']}" ?></em><br />
	User Agent: <em title="<?php echo $_SERVER['HTTP_USER_AGENT'] ?>"><?php echo substr($_SERVER['HTTP_USER_AGENT'], 0, 24) ?>...</em><br />
	Screen Resolution: <em><script>document.write (screen.width + "x" + screen.height)</script></em></p>

	</div>

	<h2><span onclick="show_hide('layer-conversion')">Conversion<span></h2>

	<div id="layer-conversion">

	<ul>
		<li><span onclick="set_conversion_type('md5')">md5</span></li>
		<li><span onclick="set_conversion_type('base64_encode')">base64 encode</span></li>
		<li><span onclick="set_conversion_type('base64_decode')">base64 decode</span></li>
		<li><span onclick="set_conversion_type('url_encode')">url encode</span></li>
		<li><span onclick="set_conversion_type('url_decode')">url decode</span></li>
		<li><span onclick="set_conversion_type('utf8_encode')">utf8 encode</span></li>
		<li><span onclick="set_conversion_type('utf8_decode')">utf8 decode</span></li>
		<li><span onclick="set_conversion_type('quoted_printable_encode')">quoted-printable encode</span></li>
		<li><span onclick="set_conversion_type('quoted_printable_decode')">quoted-printable decode</span></li>
	</ul>

	<p><textarea id="conversion-input" cols="60" rows="8"></textarea>
	<textarea id="conversion-output" readonly="readonly" cols="60" rows="8"></textarea><br />
	Type: <span id="conversion-type">md5</span> <input type="button" value="Convert" onclick="convert()" /></p>

	</div>

	<h2><span onclick="show_hide('layer-network')">Network</span></h2>

	<div id="layer-network">

	<ul>
		<li><span onclick="set_network_type('head')">HEAD</span></li>
		<li><span onclick="set_network_type('whois')">whois</span></li>
		<li><span onclick="set_network_type('host')">host</span></li>
		<li><span onclick="set_network_type('dig')">dig</span></li>
		<li><span onclick="set_network_type('ping')">ping</span></li>
		<!-- <li><span onclick="set_network_type('traceroute')">traceroute</span></li> -->
		<li><span onclick="set_network_type('nmap')">nmap</span></li>
	</ul>

	<p><input type="text" id="network-address" /><br />
	<textarea id="network-output" readonly="readonly" cols="110" rows="24"></textarea><br />
	Type: <span id="network-type">dig</span> <input id="network-button" type="button" value="Execute" onclick="network()" /></p>

	</div>

</body>
</html>
