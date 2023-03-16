<?php
$arrModel = array(

    'table' => 'admins',
    'order' => 'name',
    'label' => 'Admins',
    'nMinRegisters' => 1,

    'fields' => array(
        'id' => array(
            'label' => 'ID',
            'type' => 'textbox',
            'key' => 1,
            'list' => 1,
            'insert' => 0,
            'edit' => 0
        ),

        'name' => array(
            'label' => 'Name',
            'type' => 'textbox',
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),

        'username' => array(
            'label' => 'Username',
            'type' => 'textbox',
            'key' => 0,
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),

        'password' => array(
            'label' => 'Password',
            'type' => 'password',
            'key' => 0,
            'list' => 0,
            'insert' => 1,
            'edit' => 1
        ),

        'active' => array(
            'label' => 'Active',
            'type' => 'active',
            'key' => 0,
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),

        'lastView' => array(
            'label' => 'Ultimo Login',
            'type' => 'date_time',
            'key' => 0,
            'list' => 1,
            'insert' => 0,
            'edit' => 0
        ),
    )
);
