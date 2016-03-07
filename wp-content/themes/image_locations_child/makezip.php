<?php

// include zip class
include_once("Zip.php");


$html = '';
$status = 1;
$msg = 'Zip has been created successfully.';
$returnFile = '';
$temp = isset($_POST['images']) ? $_POST['images'] : array();
$location_slug = isset($_POST['location_slug']) ? $_POST['location_slug']:'location';
$images = explode(',', $temp);

if (is_array($images) && count($images) > 0) {
    
    
    // creating object to access the class
    $zip = new Zip();


    # create a temp file & open it
    $tmp_file = tempnam('.', '');
    $tmp_file = 'zip/images-' . rand(0, 999999999) . '.zip';
    $filename = $tmp_file;
    
    

    $files = $images;
    
    // echo "<pre>";print_r($files);exit;
    
    # loop through each file
    $i = 1;
    foreach ($files as $file) 
    {

        $download_file = file_get_contents($file);
        
        $temp = explode('.',$file);
        $ext = end($temp);
        
        if(trim($ext) == "")
            $ext = "png";
        
        $imgName = $location_slug."_image_".$i.".".$ext;

        $zip->addFile($download_file, $imgName, filectime($download_file));
        $i++;
    }

    $zip->sendZip($filename);
    
    $returnFile = $filename;        
} 
else 
{
    $status = 0;
    $msg = "Please add minimum 1 image.";
}

//$response = array(
//    'status' => $status,
//    'msg' => $msg,
//    'file' => $returnFile,
//);
//
//echo json_encode($response);
exit;
?>