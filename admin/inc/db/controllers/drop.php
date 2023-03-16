<?php
// ----------------------------
// condição WHERE, filtro para fazer alterações
// identificar os campos GET enviados
// ----------------------------
include '../../../../inc/config.inc.php';

$strKey = '';
$table = $_GET['table'];

foreach ($_GET as $k => $v) {
    if ($k != 'table') {
        $strKey .= "$k = '$v' AND ";
    }
}
$strKey = substr($strKey, 0, strlen($strKey) - 5);

// ----------------------------
// QUERY eliminar
// IMPORTANTE: validar se está tudo correto e se podemos eliminar
// ----------------------------
$query  = "DELETE FROM " . $table . " WHERE $strKey";

$res = my_query($query);

// ----------------------------
// Redirect para listagem
// ----------------------------
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
