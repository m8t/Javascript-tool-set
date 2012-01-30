<?php
if (isset($_GET['type'], $_GET['address'])) {
	$type = $_GET['type'];
	$address = $_GET['address'];
}
else {
	echo "No type specified! GTFOOH!";
	exit (1);
}

if (preg_match ('/^(10|127|172(1[6789]|2[0-9]|3[01])|192\.168|)(\.[0-9]+)+$/', $address)) {
	echo "Invalid address! ENOLOCAL!";
	exit (2);
}

if (preg_match ('/^([A-Za-z0-9-_]+\.){1,2}[a-z]{2,4}$/', $address) == 0
	&& preg_match ('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $address) == 0) {
	echo "Invalid address! GTFOOHN!";
	exit (2);
}

$address_escaped = escapeshellarg ($address);
//echo "Running $type on $address...\n";
switch ($type) {
	case 'dig':
		system ('dig +trace -t ANY ' . $address_escaped);
		break;
	case 'head':
		system ('curl -I ' . $address_escaped);
		break;
	case 'host':
		system ('host -t ANY ' . $address_escaped);
		break;
	case 'nmap':
		system ('nmap -p 21,22,53,80,443,3306,8080 ' . $address_escaped);
		break;
	case 'ping':
		system ('ping -c 4 ' . $address_escaped);
		break;
	case 'traceroute':
		system ('traceroute ' . $address_escaped);
		break;
	case 'whois':
		system ('whois ' . $address_escaped);
		break;
	default:
		exit (0);
}
//echo "\nDone.";
