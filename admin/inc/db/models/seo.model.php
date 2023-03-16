<?php
$arrModel = array(

    'table' => 'seo',
    'label' => 'Routes',
    'nMinRegisters' => 0,
    'order' => 'null',

    'fields' => array(
        'url' => array(
            'label' => 'URL',
            'type' => 'textbox',
            'key' => 1,
            'list' => 1,
            'insert' => 1,
            'edit' => 1,
        ),

        'urlFriendly' => array(
            'label' => 'Url Friendly',
            'type' => 'textbox',
            'key' => 0,
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),
        'metaDesc' => array(
            'label' => 'Meta Description',
            'type' => 'ckeditor',
            'key' => 0,
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),

    )
);
