<?php
$arrModel = array(

    'table' => 'movies',
    'order' => 'id',
    'label' => 'Movies',
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
        'quality' => array(
            'label' => 'Quality',
            'type' => 'select',
            'select_options' => array(
                array(
                    'key' => 0,
                    'label' => 'SD'
                ),
                array(
                    'key' => 1,
                    'label' => 'HD',
                    'default' => 1
                ),
                array(
                    'key' => 2,
                    'label' => 'FHD'
                ),
                array(
                    'key' => 3,
                    'label' => 'UHD'
                ),
            ),
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),
        'title' => array(
            'label' => 'Title',
            'type' => 'textbox',
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),
        'year' => array(
            'label' => 'Year',
            'type' => 'number',
            'min' => 1895,
            'max' => date('Y'),
            'step' => 1,
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),
        'cover' => array(
            'label' => 'Cover',
            'type' => 'file',
            'list' => 1,
            'insert' => 1,
            'edit' => 1,
            'folder' => 'covers',
            'max_filesize' => 10,
            'accept_files' => array('image/*'),
            'width' => 300,
            'height' => 440,
            'min' => 1,
            'max_files' => 1,
        ),
        'poster' => array(
            'label' => 'Movie Poster',
            'type' => 'file',
            'list' => 1,
            'insert' => 1,
            'edit' => 1,
            'folder' => 'posters',
            'max_filesize' => 10,
            'accept_files' => array('image/*'),
            'width' => 1172,
            'height' => 564,
            'min' => 1,
            'max_files' => 1,
        ),
        'file' => array(
            'label' => 'Trailer',
            'type' => 'file',
            'list' => 0,
            'insert' => 1,
            'edit' => 1,
            'folder' => 'movies',
            'accept_files' => array('video/*'),
            'min' => 1,
            'max_files' => 1,
        ),
        'arrPhotos' => array(
            'label' => 'Photos',
            'type' => 'file',
            'list' => 0,
            'insert' => 1,
            'edit' => 1,
            'folder' => 'photos',
            'accept_files' => array('image/*'),
            'min' => 0,
            'max_files' => 18,
        ),
        'duration' => array(
            'label' => 'Duration',
            'type' => 'time',
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),
        'director' => array(
            'label' => 'Director',
            'type' => 'textbox',
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),
        'description' => array(
            'label' => 'Description',
            'type' => 'ckeditor',
            'list' => 0,
            'insert' => 1,
            'edit' => 1
        ),
        'categories' => array(
            'label' => 'Categories',
            'type' => 'multiselect',
            'select_table' => array(
                'table' => 'categories',
                'field' => 'name',
                'filter' => 'active = 1'
            ),
            'list' => 0,
            'insert' => 1,
            'edit' => 1
        ),
        'stars' => array(
            'label' => 'Rating',
            'type' => 'number',
            'min' => 1,
            'max' => 5,
            'step' => 1,
            'list' => 1,
            'insert' => 1,
            'edit' => 1,
            'symbol' => '⭐',
        ),
        'active' => array(
            'label' => 'Active',
            'type' => 'active',
            'list' => 1,
            'insert' => 1,
            'edit' => 1
        ),
    )
);
