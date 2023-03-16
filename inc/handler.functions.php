<?php
$folderName = 'functions';
$path = $cfg['dirs']['inc'] . "/$folderName";
$di = new RecursiveDirectoryIterator($path);
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
    if (!is_dir($filename)) {
        include $filename;
    }
}

$path = $cfg['dirs']['adminIncludes'] . "/$folderName";
$di = new RecursiveDirectoryIterator($path);
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
    if (!is_dir($filename)) {
        include $filename;
    }
}
