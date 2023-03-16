<?php
@session_start();
global $cfg;

$rootDir = 'C:\xampp\htdocs\pacotetv';
$rootUrl = 'http://localhost:8080/pacotetv';

$cfg = [
    'db' => [
        'server' => 'localhost',
        'usr' => 'root',
        'pwd' => '',
        'name' => 'pacotetv'
    ],
    'loginKey' => '25A8FC2A-98F2-4B86-98F6-84324AF28611',
    'urls' => [
        'browserComponents' => $rootUrl . '/admin/bower_components',
        'site' => $rootUrl,
        'admin' => $rootUrl . '/admin',
        'uploads' => $rootUrl . '/upload',
    ],
    'dirs' => [
        'site' => $rootDir,
        'admin' => $rootDir . '\admin',
        'inc' => $rootDir . '\inc',
        'adminIncludes' => $rootDir . '\admin\inc',
        'db' => $rootDir . '\inc\db',
        'uploads' => $rootDir . '\upload',
    ],
    'movies' => [
        'qualities' => [
            'SD',
            'HD',
            'UHD'
        ]
    ]
];

//? Database & Functions
include_once $cfg['dirs']['db'] . '\db.inc.php';
$cfg['db']['conn'] = my_connect($cfg);
include_once $cfg['dirs']['inc'] . '\handler.functions.php';

//? Log page
logger();
