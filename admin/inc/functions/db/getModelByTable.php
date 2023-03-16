<?php
function getModelByTable($cfg, $tableName)
{

    $path = $cfg['dirs']['adminIncludes'] . '/db/models';
    foreach (new DirectoryIterator($path) as $file) {
        if (!is_dir($file)) {
            include $path . "/$file";
            if ($arrModel['table'] == $tableName) {
                return $path . "/$file";
            }
        }
    }
    throw new Exception("Table does not exist");
}
