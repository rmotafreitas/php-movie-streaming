<?php
$arrModel = array(

    'table' => 'menu',
    'order' => 'position',
    'label' => 'Menu',
    'nMinRegisters' => 1,
    'multilevel' => 1,

    'fields' => array(
        'id' => array(
            'label' => 'ID',
            'type' => 'textbox',
            'key' => 1,
            'list' => 1,
            'insert' => 0,
            'edit' => 0
        ),

        'parent' => array(
            'label' => 'Parent',
            'type' => 'select',
            'select_table' => array(
                'table' => 'menu',
                'filter' => 'active = 1',
                'field' => 'name'
            ),
            'list' => 0,
            'insert' => 1,
            'edit' => 1,
            'multilevel_key' => 1
        ),

        'name' => array(
            'label' => 'Name',
            'type' => 'textbox',
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),

        'url' => array(
            'label' => 'URL',
            'type' => 'textbox',
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),

        'position' => array(
            'label' => 'Order',
            'type' => 'textbox',
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),

        'active' => array(
            'label' => 'Active',
            'type' => 'active',
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        )
    )
);
