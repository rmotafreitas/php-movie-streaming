<?php
// Do a function to get a key from a model
function getModelKey($cfg, $tableName)
{
    $file = getModelByTable($cfg, $tableName);
    include $file;
    $arrKeys = array();
    foreach ($arrModel['fields'] as $key => $arrField) {
        if (isset($arrField['key']) && $arrField['key']) {
            $arrKeys[] = $key;
        }
    }
    if (count($arrKeys) == 1) {
        return $arrKeys[0];
    } else {
        throw new Exception('Model has more than one key or none');
    }
}
