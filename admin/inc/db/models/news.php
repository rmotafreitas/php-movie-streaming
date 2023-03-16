<?php
$arrModel = array(

    'table' => 'news',
    'order' => 'id',
    'label' => 'News',
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

        'title' => array(
            'label' => 'Title',
            'type' => 'textbox',
            'key' => 0,
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),

        'content' => array(
            'label' => 'Description',
            'type' => 'ckeditor',
            'list' => 0,
            'insert' => 1,
            'edit' => 1
        ),

        'image' => array(
            'label' => 'Image',
            'type' => 'file',
            'list' => 1,
            'insert' => 1,
            'edit' => 1,
            'folder' => 'news',
            'min' => 1,
            'max_files' => 1,
            'max_filesize' => 10,
            'width' => 770,
            'height' => 430,
            'accept_files' => array('image/*'),
        )
    )
);
