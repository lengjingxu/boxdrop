<?php
$fileurl=  "https://dl.dropboxusercontent.com/1/view/pnadlale8qo0122/MBA E buiness/Droit/DroitE-Business.docx"; 

$filename= substr($fileurl,strripos($fileurl,"/")+1);




  
    $fp_output = fopen('./'.$filename, 'w');
    $ch = curl_init($fileurl);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_FILE, $fp_output);
    curl_exec($ch);
    curl_close($ch);  
	
	
	
	
 
?>
