<?php
$arrModel = array(

    'table' => 'sugestions',
    'order' => 'id',
    'label' => 'Suggestions',
    'nMinRegisters' => 0,
    'onlyDelete' => 1,

    'fields' => array(
        'id' => array(
            'label' => 'ID',
            'type' => 'textbox',
            'key' => 1,
            'list' => 0,
            'insert' => 0,
            'edit' => 0
        ),

        'sugestion' => array(
            'label' => 'Suggestion',
            'type' => 'textbox',
            'key' => 0,
            'list' => 1,
            'insert' => 0,
            'edit' => 0
        ),
    )
);
