<?php

function checkAuth($cfg)
{
    $erroAuth = 0;

    if (!isset($_SESSION['isLoggedIn'])) {
        $erroAuth = 1;
    } elseif ($_SESSION['isLoggedIn'] != $cfg['loginKey']) {
        $erroAuth = 2;
    }

    if ($erroAuth) {
        header('Location: ' . $cfg['urls']['admin'] . '/pages/login/index.php');
        exit();
    }
}
