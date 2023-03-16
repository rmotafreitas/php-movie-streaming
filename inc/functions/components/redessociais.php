<?php
function redessociais()
{
    $sql = 'SELECT * FROM redessociais WHERE active = 1';
    $res = my_query($sql);
    echo '<div class="blog__details__social">';
    foreach ($res as $value) {
        echo '<a href="' . $value['link'] . '" class="facebook" style="background: ' . $value['cor'] . ';"><i class="fa fa-' . $value['icon'] . '"></i> ' . $value['nome'] . '</a>';
    }
    echo '</div>';
}
