<?php
function clog($output, $will_die = false)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    $js_code = '<script>' . $js_code . '</script>';
    echo $js_code;
    if ($will_die) {
        die;
    }
}
