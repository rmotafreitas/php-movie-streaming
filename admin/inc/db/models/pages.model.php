<?php
$arrModel = array(

    'table' => 'pages',
    'order' => 'id',
    'label' => 'Dynamical Pages',
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

        'text' => array(
            'label' => 'Text',
            'type' => 'ckeditor',
            'list' => 0,
            'insert' => 1,
            'edit' => 1
        ),

        'imageLocation' => array(
            'label' => 'Image Side',
            'type' => 'select',
            'select_options' =>  array(
                array(
                    'key' => 0,
                    'label' => 'Sem imagem',
                    'default' => 1
                ),
                array(
                    'key' => 1,
                    'label' => 'Imagem em cima',
                ),
                array(
                    'key' => 2,
                    'label' => 'Imagem à direita',
                ),
                array(
                    'key' => 3,
                    'label' => 'Imagem em baixo',
                ),
                array(
                    'key' => 4,
                    'label' => 'Imagem à esquerda',
                ),
            ),
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),

        'image' => array(
            'label' => 'Image',
            'type' => 'file',
            'list' => 1,
            'insert' => 1,
            'edit' => 1,
            'folder' => 'pages',
            'max_files' => 1,
            'min' => 0,
            'max_filesize' => 10,
            'accept_files' => array('image/*'),
        ),
    )
);
