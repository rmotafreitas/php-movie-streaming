<?php
include '../../../../inc/config.inc.php';

$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = $cfg['dirs']['uploads'] . $ds . $_GET['folder'];   //2
$width = $_GET['width'];
$height = $_GET['height'];

if (!empty($_FILES)) {

    $tempFile = $_FILES['file']['tmp_name'];          //3             

    if ($width) {
        $img = new ImageResize($tempFile);
        $img->crop($width, $height);
        $img->save($tempFile);
    }

    $targetPath = $storeFolder . $ds;  //4

    $targetFile =  $targetPath . $_FILES['file']['name'];  //5

    move_uploaded_file($tempFile, $targetFile); //6

}
