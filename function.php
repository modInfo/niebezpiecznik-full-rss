<?PHP

#if ($_GET['auth_key'] != 'XXXXXXXXXXXXXXX') {
#die;
#}

function cleanText($wert) {
	$wert = strip_tags($wert);
	$wert = htmlentities($wert, ENT_QUOTES, "UTF-8");
	$wert = trim($wert);
	$wert = stripslashes($wert);
//	$wert = mysql_real_escape_string($wert);
	return $wert;
}

function http_parse_headers( $header ) {
	preg_match_all('#Location: (.*)/\?#msU', trim($header), $h);
	return $h[0][0];
}

function makeNormal($url) {
	$ch = curl_init($url);
	curl_setopt($ch,CURLOPT_HEADER,true);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,false);
	$data = curl_exec($ch);
	$pdata = http_parse_headers($data);
	$pdata = str_replace ("Location: http://niebezpiecznik.pl", "", $pdata);
	return $pdata;
}

require_once('db.php');
$time = time();

$feed = 'http://feeds.feedburner.com/niebezpiecznik?format=rss';
$array = (array) simplexml_load_file($feed);

for ($i = 0; $i <= 20; $i++) {
	$link = cleanText(makeNormal($array['entry'][$i]->link['href']));

	$count = $db->query("SELECT * FROM `posts` WHERE post = '$link'")->rowCount();
	if ($count == 0) {
		if ( strlen($link) >= 3 ) {
			$db->query("INSERT INTO `posts` (`post`, `data`) VALUES ('$link', '$time');");
		}
	}
}


?>
