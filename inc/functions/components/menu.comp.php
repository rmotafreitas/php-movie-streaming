<?php
function menu($cfg, $pai = 0)
{
    $query = "SELECT * FROM menu WHERE active = '1' AND parent = '$pai' ORDER BY position";

    $res = my_query($query);
    foreach ($res as $k => $v) {
        $query = "SELECT * FROM menu WHERE active = '1' AND parent = '" . $v['id'] . "' ORDER BY position";
        $resSubMenu = my_query($query);

        if (count($resSubMenu) > 0) {
            echo '<li>';
            echo '<a href="' . getUrlFriendly($v['url'], $cfg) . '">' . $v['name'] . ' <span class="arrow_carrot-down"></span></a>';
            echo '<ul class="dropdown">';
            menu($cfg, $v['id']);
            echo '</ul>';
            echo '</li>';
        } else {
            echo '<li ' . (basename($_SERVER['PHP_SELF']) == $v['url'] ? 'class="active"' : '') . '><a href="' . getUrlFriendly($v['url'], $cfg) . '">' . $v['name'] . '</a></li>';
        }
    }
}
