<?php
$arrModel = array(

    'table' => 'categories',
    'order' => 'name',
    'label' => 'Categories',
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

        'active' => array(
            'label' => 'Active',
            'type' => 'active',
            'key' => 0,
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        )
    )
);
