<?php
function logger()
{
    $data = date("Y/m/d");
    $hora = date("H:i:s");
    $autor_id = isset($_SESSION['isLoggedIn']) ? $_SESSION['uid'] : 0;
    if (!$autor_id) {
        $autor = "Convidado";
    } else {
        $autor = $_SESSION['uname'];
    }
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "http" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $ip = $_SERVER['REMOTE_ADDR'];
    $query = "INSERT INTO `logs` (`data`, `hora`, `autor`, `url`, `ip`) VALUES ('$data', '$hora', '$autor', '$url', '$ip')";
    my_query($query);
}
