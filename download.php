<?php
$fileurl=  $_POST['dropurl']; 

$filename= $_POST['filename'];


function progress ($resource, $download_size, $downloaded_size) {
    $return = $downloaded_size/$download_size;
	$return["json"] = json_encode($return);
	echo json_encode($return);
};
    $fp_output = fopen('./'."$filename", 'w');
    $ch = curl_init($fileurl);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_FILE, $fp_output);
	curl_setopt($ch,CURLOPT_NOPROGRESS,0);
	curl_setopt($ch,CURLOPT_PROGRESSFUNCTION,'progress');
    curl_exec($ch);
    curl_close($ch);  
	
?>
