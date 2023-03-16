<?php
function getUrlFriendly($url, $cfg)
{
    $queryUrl = parse_url($url, PHP_URL_QUERY);
    parse_str($queryUrl, $params);
    $urlWithoutQuery = preg_replace('/\?.*/', '', $url);
    $sql = "SELECT * FROM `seo` WHERE `url` = '$urlWithoutQuery'";
    $result = my_query($sql);
    if (count($result) > 0) {
        $urlFriendly = $result[0]['urlFriendly'];
        foreach ($params as $key => $parm) {
            if (str_contains($urlFriendly, '{' . $key . '}')) {
                $urlFriendly = str_replace('{' . $key . '}', $parm, $urlFriendly);
                unset($params[$key]);
            }
        }
        $urlFriendly = str_replace(' ', '-', $urlFriendly);
        $urlFriendly = preg_replace('/[^a-zA-Z0-9\/\-\.]/', '', $urlFriendly);
        $urlFriendly = strtolower($urlFriendly);

        return $cfg['urls']['site'] . $urlFriendly . (count($params) > 0 ? '?' . http_build_query($params) : '');
    } else {
        return $cfg['urls']['site'] . '/' . $url;
    }
}
