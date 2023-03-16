<?php
include 'inc/config.inc.php';
$route = new Route();

$sql = "SELECT * FROM seo";
$result = my_query($sql);
foreach ($result as $key => $url) {
    $route->add($url['urlFriendly'], $url['url']);
}

$route->notFound("404.php");
