<?php
$fileurl=  $_POST['dropurl']; 

$filename= $_POST['filename'];

    $fp_output = fopen('./'."$filename", 'w');
    $ch = curl_init($fileurl);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_FILE, $fp_output);
    curl_exec($ch);
    curl_close($ch);  
	
 echo "$filename";
echo "<br>";
echo "$fileurl";
?>
