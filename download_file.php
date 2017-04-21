<?
require 'config.php';
function download($url,$file){
    if (!preg_match('/^http:\/\//', $url)) {
        $url = "http://" . $url;
    }
    $url=str_replace("http:////","http://",$url);
    echo "downloading ".$url."\n";
    $fp_output = fopen($file, 'w');
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_FILE, $fp_output);
    //curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    curl_exec($ch);
    curl_close($ch);
}

$url=$_GET['url'];
$saveto=$_GET['saveto'];
$saveto=str_replace("..","",$saveto);
$array = explode("/",$url);
$file_name=$download_dir."/".$saveto."/".$array[count($array)-1];
download($url,$file_name);
?>