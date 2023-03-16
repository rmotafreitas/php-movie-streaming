<?php
$arrModel = array(

    'table' => 'redessociais',
    'order' => 'id',
    'label' => 'Social Links',
    'nMinRegisters' => 0,

    'fields' => array(
        'id' => array(
            'label' => 'ID',
            'type' => 'textbox',
            'key' => 1,
            'list' => 1,
            'insert' => 0,
            'edit' => 0
        ),

        'link' => array(
            'label' => 'URL',
            'type' => 'textbox',
            'list' => 0,
            'insert' => 1,
            'edit' => 1
        ),

        'nome' => array(
            'label' => 'Name',
            'type' => 'textbox',
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),

        'icon' => array(
            'label' => 'Icon',
            'type' => 'textbox',
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),

        'cor' => array(
            'label' => 'Color',
            'type' => 'color',
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
