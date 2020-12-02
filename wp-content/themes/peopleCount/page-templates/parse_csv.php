<?php 
/* Template Name: parse_csv Template */ 

if( isset($_POST['file']) ){
	$file = fopen($_POST['file'],"r");
	echo fgetcsv($file);
	fclose($file);
}



?>