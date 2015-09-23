<?php
$fileurl=  "http://blog.chinaunix.net/uid-26696966-id-3181311.html"; 

$filename= substr($fileurl,strripos($fileurl,"/")+1);


 echo "$filename";
echo "<br>";
echo "$fileurl";

function downloadProgress ($resource, $download_size, $downloaded_size) {
    echo 'download_size: ' . $download_size . '; downloaded_size: ' . $downloaded_size . ';<br>';
};
    $fp_output = fopen('./'."$filename", 'w');
    $ch = curl_init($fileurl);
	
    curl_setopt($ch, CURLOPT_FILE, $fp_output);
	curl_setopt($ch,CURLOPT_NOPROGRESS,0);
	curl_setopt($ch,CURLOPT_PROGRESSFUNCTION,'downloadProgress');
    curl_exec($ch);
    curl_close($ch);  
	fclose($fp_output);
	
echo "ok";
 
?>
