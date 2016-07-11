<?php

/**
 * Table tl_topics
 */
$GLOBALS['TL_DCA']['tl_topics'] = array
(

    // Config
    'config' => array
    (
        'dataContainer' => 'Table',
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary',
            )
        ),
        'model' => Fuzzyma\Contao\EloquentExampleProjectBundle\Models\Topic::class
    ),

    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode' => 2,
            'fields' => array('name DESC')
        ),
        'label' => array
        (
            'fields' => array('name', 'value'),
            'format' => '%s => %s',
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_comments']['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.svg',
            ),
            'delete' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_comments']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.svg',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
            ),
            'show' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_comments']['show'],
                'href' => 'act=show',
                'icon' => 'show.svg'
            )
        )
    ),
    // Palettes
    'palettes' => array
    (
        'default' => '{general_legend},name,audio,author_id,infos,tags,thumbnail;{published_legend},published'
    ),

    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array
        (
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'name' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_topics']['name'],
            'search' => true,
            'inputType' => 'text',
            'eval' => array('mandatory' => true, 'maxlength' => 64),
            'sql' => "varchar(64) NOT NULL default ''"
        ),
        'audio' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_topics']['audio'],
            'inputType' => 'select',
            'eloquent' => [
                'relation' => 'hasOne',
                'model' => Fuzzyma\Contao\EloquentExampleProjectBundle\Models\Audio::class,
                'label' => '%name%'
            ]
        ),
        'author_id' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_topics']['author_id'],
            'inputType' => 'select',
            'sql' => "int(10) unsigned NULL",
            'eloquent' => [
                'relation' => 'belongsTo',
                'model' => Fuzzyma\Contao\EloquentExampleProjectBundle\Models\User::class,
                'label' => '%name% (%email%)'
                // 'medthod' => 'author' // is automatically assumed because author_id becomes author
            ]
        ),
        'infos' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_topics']['infos'],
            'inputType' => 'select',
            'eval' => ['multiple' => true],
            'eloquent' => [
                'relation' => 'hasMany',
                'model' => Fuzzyma\Contao\EloquentExampleProjectBundle\Models\Info::class,
                'label' => '%content%'
            ]
        ),
        'tags' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_topics']['tags'],
            'inputType' => 'select',
            'eval' => ['multiple' => true],
            'eloquent' => [
                'relation' => 'belongsToMany',
                'model' => Fuzzyma\Contao\EloquentExampleProjectBundle\Models\Tag::class,
                'label' => '%name% [%comment%]'
                // 'medthod' => 'tags' // is automatically assumed
            ]
        ),
        'thumbnail' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_topics']['thumbnail'],
            'inputType' => 'fileTree',
            'eval' => ['filesOnly' => true, 'fieldType' => 'radio'],
            'sql' => "binary(16) NULL",
        ),
        'published' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_topics']['published'],
            'filter' => true,
            'inputType' => 'checkbox',
            'eval' => array('doNotCopy' => true),
            'sql' => "char(1) NOT NULL default ''"
        )

    )
);
