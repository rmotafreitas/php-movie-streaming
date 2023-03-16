<?php
function checkModel($cfg, $arrModel)
{
    //! Check if only one field is multi-level
    $arrPaiKey = array();
    $strWherePai = 'WHERE 1=1 ';
    $multilevellist = 0;
    $contaCamposmultilevel = 0;

    if (isset($arrModel['multilevel'])) {
        if ($arrModel['multilevel'] == 1) {
            foreach ($arrModel['fields'] as $k => $v) {
                if (isset($v['multilevel_key'])) {
                    $arrPaiKey[] = $k;
                    $multilevellist = 1;
                    $contaCamposmultilevel++;

                    if ($contaCamposmultilevel > 1) {
                        die("Erro: múltiplos campos multilevel_key");
                        exit();
                    }

                    if (!isset($_GET[$k])) {
                        if ($v['multilevel_key'] == 1) {
                            $strWherePai .= "AND $k = '0' ";
                        }
                    } else {
                        $strWherePai .= "AND $k = '$_GET[$k]' ";
                    }
                }
            }
        }
    }
}
