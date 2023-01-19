<?php
echo $_SERVER["REMOTE_ADDR"];
echo "<br><br>";
$myfile = fopen("request_log.txt", "a");

$now = date('Y-m-d H:i:s');

$headers = apache_request_headers();

$post_data = file_get_contents("php://input");

$fp = fopen("ip.txt", "r");
$ip = trim(fgets($fp));

fwrite($myfile, "\n");
fwrite($myfile, $now."\n");
fwrite($myfile, $_SERVER["REMOTE_ADDR"]."\n");
foreach ($headers as $header => $value) {
	if ($_SERVER["REMOTE_ADDR"] == $ip) {
    		echo "$header: $value <br />\n";
	}
	fwrite($myfile, "$header: $value \n");
}
	fwrite($myfile, "\n$post_data\n");

?>

