<?PHP
/*
 * Oczyszczanie wpisu na potrzeby rss
 * */
function clean($content){
    $content = str_replace(array("\r\n", "\r", "\n"), "", $content);
    $content = htmlspecialchars($content);
    return $content;
}

/*
 * FIXME
 * Prowizoryczne pobieranie tytułu newsa z urla i formatowanie go
 * */
function getTitle($post) {
	preg_match('#\/post\/(.*)\/\?#msU', trim($post), $title);  
	return str_replace( '-', ' ', $title[1] );
}

/*
 * Pobieranie wpisu
 * */
function getDescription($url) {
    $curlchanel2 = curl_init('http://niebezpiecznik.pl' . $url);
    curl_setopt($curlchanel2, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64; rv:25.0) Gecko/20100101 Firefox/25.0');
    curl_setopt($curlchanel2, CURLOPT_HEADER, 1);
    curl_setopt($curlchanel2, CURLOPT_TIMEOUT, 6);
    curl_setopt($curlchanel2, CURLOPT_RETURNTRANSFER, 1);
    $strona = trim(curl_exec($curlchanel2));
    curl_close($curlchanel2);
    //preg_match_all('#<div class="post" id="post-(.*)">(.*)<div style="margin-top:-10px;margin-bottom:10px;">#msU', trim($strona), $h);
    //preg_match_all('#<script type="text\/javascript" src="http:\/\/pagead2.googlesyndication.com\/pagead\/show_ads.js">(.*)<div style="margin-bottom:10px">#msU', trim($strona), $h);
    preg_match_all('#<\/div><\/p><p>(.*)<div style="margin-bottom:10px">#msU', trim($strona), $h); // zmienają :C
    return clean($h[1][0]);
}

?>
