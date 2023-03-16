<?php
include '../../../../inc/config.inc.php';

$table = $_GET['table'];
$file = getModelByTable($cfg, $table);
include $file;

$strNomeCampos = '';
$strValorCampos = '';
foreach ($arrModel['fields'] as $k => $v) {
    if ($v['insert']) {
        $strNomeCampos .= $k . ', ';

        switch ($v['type']) {
            case 'active':
            case 'checkbox':
                if (!isset($_POST[$k])) {
                    $valorCheckbox = 0;
                } else {
                    $valorCheckbox = 1;
                }
                $strValorCampos .= "'" . $valorCheckbox . "', ";
                break;
            case 'password':
                $valorPassword = password_hash($_POST[$k], PASSWORD_DEFAULT);
                $strValorCampos .= "'" . $valorPassword . "', ";
                break;

            default:
                if (isset($_POST[$k]))
                    $strValorCampos .= "'" . $_POST[$k] . "', ";
                break;
        }
    }
}
$strNomeCampos = substr($strNomeCampos, 0, strlen($strNomeCampos) - 2);
$strValorCampos = substr($strValorCampos, 0, strlen($strValorCampos) - 2);

// ----------------------------
// QUERY inserir
// IMPORTANTE: validar se está tudo correto e se podemos inserir
// ----------------------------
$query  = "INSERT INTO " . $arrModel['table'] . " ($strNomeCampos) VALUES ($strValorCampos)";
$resID = my_query($query);

// ----------------------------
// Redirect para listagem
// ----------------------------
header('Location: ' . $cfg['urls']['admin'] . '/pages/dashboard/listTable.php?table=' . $arrModel['table']);
exit();
