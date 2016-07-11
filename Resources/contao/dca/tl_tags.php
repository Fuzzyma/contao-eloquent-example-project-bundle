<?php

/**
 * Table tl_tags
 */
$GLOBALS['TL_DCA']['tl_tags'] = array
(

    // Config
    'config' => array
    (
        'dataContainer' => 'Table',
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary'
            )
        ),
        'model' => Fuzzyma\Contao\EloquentExampleProjectBundle\Models\Tag::class
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
            'fields' => array('name'),
            'format' => '%s',
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
        'default' => '{general_legend},name,comment,topics;'
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
            'label' => &$GLOBALS['TL_LANG']['tl_tags']['name'],
            'search' => true,
            'inputType' => 'text',
            'eval' => array('mandatory' => true, 'maxlength' => 64),
            'sql' => "varchar(64) NOT NULL default ''"
        ),
        'comment' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_tags']['comment'],
            'search' => true,
            'inputType' => 'textarea',
            'eval' => array('rte' => 'tinyMCE'),
            'sql' => "text NULL"
        ),
        'topics' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_tags']['topics'],
            'inputType' => 'select',
            'eval' => ['multiple' => true],
            'eloquent' => [
                'relation' => 'belongsToMany',
                'model' => Fuzzyma\Contao\EloquentExampleProjectBundle\Models\Topic::class,
                'label' => '%name%'
            ]
        )
    )
);
