<?php

/**
 * Table tl_infos
 */
$GLOBALS['TL_DCA']['tl_infos'] = array
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
        'model' => Fuzzyma\Contao\EloquentExampleProjectBundle\Models\Info::class
    ),

    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode' => 2,
            'fields' => array('content DESC')
        ),
        'label' => array
        (
            'fields' => array('content'),
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
        'default' => '{general_legend},content,topic_id'
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
        'content' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_infos']['content'],
            'search' => true,
            'inputType' => 'textarea',
            'eval' => array('mandatory' => true, 'maxlength' => 64, 'rte' => 'tinyMCE'),
            'sql' => "text NULL"
        ),
        'topic_id' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_infos']['topic_id'],
            'inputType' => 'select',
            'sql' => "int(10) unsigned NULL",
            'eloquent' => [
                'relation' => 'belongsTo',
                'model' => Fuzzyma\Contao\EloquentExampleProjectBundle\Models\Topic::class,
                'label' => '%name%'
            ]
        )

    )
);
