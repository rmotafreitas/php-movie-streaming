<?php
include '../../../../inc/config.inc.php';

$table = $_GET['table'];
$file = getModelByTable($cfg, $table);
include $file;

$strKey = $_POST['pkey'];

$strNomeCampos = '';

foreach ($arrModel['fields'] as $k => $v) {
    if ($v['edit']) {
        switch ($v['type']) {
            case 'active':
            case 'checkbox':
                if (!isset($_POST[$k])) {
                    $valorCheckbox = 0;
                } else {
                    $valorCheckbox = 1;
                }
                $strNomeCampos .= "$k = '" . $valorCheckbox . "', ";
                break;
            case 'password':
                if ($_POST[$k] != '') {
                    $valorPassword = password_hash($_POST[$k], PASSWORD_DEFAULT);
                    $strNomeCampos .= "$k = '" . $valorPassword . "', ";
                }
                break;
            default:
                if (isset($_POST[$k]))
                    $strNomeCampos .= "$k = '" . $_POST[$k] . "', ";
                break;
        }
    }
}

$strNomeCampos = substr($strNomeCampos, 0, strlen($strNomeCampos) - 2);

$query  = "UPDATE " . $arrModel['table'] . " SET $strNomeCampos WHERE $strKey";
$res    = my_query($query);


header('Location: ' . $cfg['urls']['admin'] . '/pages/dashboard/listTable.php?table=' . $arrModel['table']);
exit();
