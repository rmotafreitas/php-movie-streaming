<?php
// ----------------------------
// condição WHERE, filtro para casos multinível
// IMPORTANTE: podemos ter de garantir que só existe um campo multinível
// ----------------------------
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

// ----------------------------
// identificar os campos chave da tabela
// IMPORTANTE: podemos ter de verificar o código para situações com múltiplos campos chave
// ----------------------------
$arrKey = array();
$contaCamposKey = 0;

foreach ($arrModel['fields'] as $k => $v) {
    if (isset($v['key'])) {
        if ($v['key']) {
            $contaCamposKey++;
            if ($contaCamposKey > 1) {
                die("Erro: múltiplos campos key");
                exit();
            }

            $arrKey[] = $k;
        }
    }
}

// ----------------------------
// QUERY listagem
// ----------------------------
$query = 'SELECT * FROM ' . $arrModel['table'] . ' ' . $strWherePai . ' ORDER BY ' . $arrModel['order'] . " LIMIT $offset, $limit";
$res = my_query($query);
$numRegistos = count($res);

// ----------------------------
// permite apagar todos os registos?
// IMPORTANTE: vai controlar o número de registos atuais
// ----------------------------


?>

<?php
if ($numRegistos > 0) {
?>
    <?php
    // cabeçalho da tabela
    ?>
    <thead>
        <tr>
            <?php
            foreach ($arrModel['fields'] as $k => $v) {
                if ($v['list']) {
                    $symbol = isset($v['symbol']) ? $v['symbol'] : '';
                    echo '<th>' . $v['label'] . ' ' . $symbol . '</th>';
                }
            }
            ?>

            <th>Operações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //linhas da tabela
        for ($i = 0; $i < $numRegistos; $i++) {
            $flagApagarRegistos = true;
            if (isset($arrModel['nMinRegisters'])) {
                if ($numRegistos <= $arrModel['nMinRegisters']) {
                    $flagApagarRegistos = false;
                }
            }

            // ----------------------------
            // $strKey
            // construir os campos chave do URL
            // ----------------------------
            $strKey = '';
            foreach ($arrKey as $k => $v) {
                $strKey .= '&' . $v . '=' . $res[$i][$v];
            }
        ?>
            <tr>
                <?php
                // ----------------------------
                // apresenta campos genéricos da listagem
                // ----------------------------
                foreach ($arrModel['fields'] as $k => $v) {
                    if ($v['list']) {
                        switch ($v['type']) {
                            case 'img':
                                if (is_file($cfg['dir_fotos'] . '/' . $v['folder'] . '/' . $res[$i][$k])) {
                                    echo '<td><img height="50" src="' . $cfg['url_fotos'] . '/' . $v['folder'] . '/' . $res[$i][$k] . '"></td>';
                                } else {
                                    echo '<td>Sem imagem</td>';
                                }
                                break;
                            case 'file':
                                if (is_file($cfg['dirs']['uploads'] . '/' . $v['folder'] . '/' . $res[$i][$k])) {
                                    echo '<td><a target="_blank" href="' . $cfg['urls']['uploads'] . '/' . $v['folder'] . '/' . $res[$i][$k] . '">Ver</a></td>';
                                } else {
                                    echo '<td>Sem dados</td>';
                                }
                                break;
                            case 'active':
                                $class = $res[$i][$k] ? 'green' : 'red';
                                $status = $res[$i][$k] ? 'Ativo' : 'Desativo';
                                echo '<td class="text-center"><div class="status-pill ' . $class . '" data-title="' . $status . '" data-toggle="tooltip"></div></td>';
                                break;
                            case 'color':
                                echo '<td class="text-center"><div class="status-pill red" style="background-color: ' . $res[$i][$k] . ';" data-title="' . $res[$i][$k] . '" data-toggle="tooltip"></div></td>';
                                break;
                            case 'select':
                                if (isset($v['select_table'])) {
                                    $key = getModelKey($cfg, $v['select_table']['table']);
                                    $query = 'SELECT * FROM ' . $v['select_table']['table'] . ' WHERE ' . $key . ' = ' . $res[$i][$k];
                                    $resSelect = my_query($query);
                                    echo '<td>' . $resSelect[0][$v['select_table']['field']] . '</td>';
                                } else {
                                    echo '<td>' . $v['select_options'][$res[$i][$k]]['label'] . '</td>';
                                }
                                break;
                            case 'multiselect':
                                $str = '';
                                $arrCategorias = explode(',', $res[$i][$k]);
                                $query = "SELECT * FROM `categories`";
                                $arrAllCategorias = my_query($query);
                                $arrAllCategorias = indexedArray('id', $arrAllCategorias);
                                $arrStr = array();
                                foreach ($arrCategorias as $value) {
                                    array_push($arrStr, $arrAllCategorias[$value]['name']);
                                }
                                echo '<td>' . implode(', ', $arrStr) . '</td>';
                                break;
                            default:
                                $symbol = isset($v['symbol']) ? $v['symbol'] : '';
                                echo '<td>' . $res[$i][$k] . ' ' . $symbol . '</td>';
                                break;
                        }
                    }
                }
                ?>

                <!-- colunas gerais -->
                <td class="row-actions">
                    <?php
                    if (!$onlyDelete) { ?>
                        <a href="<?php echo $cfg['urls']['admin'] . '/pages/dashboard/editForm.php?table=' . $arrModel['table'] . $strKey; ?>"><i class="os-icon os-icon-ui-49"></i></a>
                    <?php }
                    ?>
                    <?php
                    if (isset($arrModel['multilevel'])) {
                        if ($arrModel['multilevel'] == 1) {
                            $query = "SELECT * FROM  " . $arrModel['table'] . " WHERE " . $arrPaiKey[0] . " = '" . $res[$i][$arrKey[0]] . "'";
                            $resFilhos = my_query($query);
                            if (count($resFilhos) > 0) {
                                $flagApagarRegistos = 0;
                            }
                        }
                    }
                    if ($flagApagarRegistos) {
                    ?>
                        <a class="danger" href="<?php echo $cfg['urls']['admin'] . '/inc/db/controllers/drop.php?table=' . $arrModel['table'] . $strKey; ?>"><i class="os-icon os-icon-ui-15"></i></a>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($arrModel['multilevel'])) {
                        if ($arrModel['multilevel'] == 1) {
                            if ($multilevellist) {
                                if (count($resFilhos) > 0) {
                    ?>
                                    <a style="color: orange;" href="listTable.php?table=<?= $arrModel['table'] ?>&<?= $arrPaiKey[0] ?>=<?= $res[$i][$arrKey[0]] ?>"><i class="os-icon os-icon-ui-22"></i></a>
                    <?php
                                }
                            }
                        }
                    }
                    ?>
                </td>

            </tr>
        <?php
        }
        ?>
    </tbody>
<?php
} else {
    echo "Não existem registos para a tabela.";
}
