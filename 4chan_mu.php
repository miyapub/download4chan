<?
require 'simple_html_dom.php';
require 'config.php';
$base_url="http://boards.4chan.org/g/";
$save_to="g";
$urls=array();
$images=array();


for ($x=1; $x<=10; $x++) {
    if($x===1){
        $url=$base_url;
    }else{
        $url=$base_url.$x;
    }
    array_push($urls,$url);
}


foreach ($urls as $url) {
    $html = file_get_html($url);
    foreach($html->find('.fileThumb') as $element){
        $img=$element->href;
        $url="$host/download_file.php?url=$img&saveto=$save_to";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        curl_exec($ch);
        curl_close($ch);
    }
}

?>