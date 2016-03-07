<?php

$fileName = 'PHP_Compress_specific_file_Details.pdf';
$fileDir = './'; // Current folder
// This is only to show that ob_start can be called, however the buffer must be empty when sending.
ob_start();

// include zip class
include_once("Zip.php");

$file = "http://photos3.imagelocations.com/wp-content/uploads/2015/05/SkyStudio-Collage_9-24-152.jpg";
$download_file = file_get_contents($file);
$imgName = "SkyStudio-Collage_9-24-152.jpg";

// creating object to access the class
$zip = new Zip();

$zip->addDirectory('images');

$zip->addFile($download_file, $imgName, filectime($download_file));

// creating zip file
$zip->setZipFile("PHP_Compress_specific_file_example.zip");
?>