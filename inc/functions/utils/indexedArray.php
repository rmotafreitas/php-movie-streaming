<?php
function indexedArray($key, $arr)
{
    $arrToReturn = array();
    foreach ($arr as $value) {
        $arrToReturn[$value[$key]] = $value;
    }
    return $arrToReturn;
}
