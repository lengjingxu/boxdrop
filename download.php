<?php
$fileurl=  $_POST['dropurl']; 

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

fwrite($myfile, $fileurl);

fclose($myfile);

$filename= substr($fileurl,strripos($fileurl,"/")+1,strripos($fileurl,"?")-strripos($fileurl,"/")-1);


$url= substr($fileurl,0,strripos($fileurl,"=")+1)."1";


  
    $fp_output = fopen('./'.$filename, 'w');
    $ch = curl_init($url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_FILE, $fp_output);
    curl_exec($ch);
    curl_close($ch); 
 
?>
