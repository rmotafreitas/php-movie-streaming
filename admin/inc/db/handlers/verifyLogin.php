<?php
include '../../../../inc/config.inc.php';

$usr = $_POST['usr'];
$pwd = $_POST['pwd'];

$query = "SELECT * FROM admins WHERE username = '$usr' AND active = '1'";

$res = my_query($query);

if (count($res) > 0) {
    if (password_verify($pwd, $res[0]['password'])) {
        $_SESSION['isLoggedIn'] = $cfg['loginKey'];
        $_SESSION['uid'] = $res[0]['id'];
        $_SESSION['uname'] = $res[0]['name'];
        $_SESSION['uacesso'] = $res[0]['lastView'];

        $newDate = date('Y-m-d H:i:s');
        $query = "UPDATE admins SET lastView = '$newDate' WHERE id = " . $_SESSION['uid'];
        $res = my_query($query);

        header('Location: ' . $cfg['urls']['admin'] . '/pages/dashboard/index.php');
        exit();
    }
}

header('Location: ' . $cfg['urls']['admin'] . '/pages/login/index.php?erro=1');
exit();
