<?php
include '../../../inc/config.inc.php';
session_destroy();

header('Location: ' . $cfg['urls']['admin']);
