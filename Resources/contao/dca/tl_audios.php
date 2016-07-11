<?php

/**
 * Table tl_audios
 */
$GLOBALS['TL_DCA']['tl_audios'] = array
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
        'model' => Fuzzyma\Contao\EloquentExampleProjectBundle\Models\Audio::class
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
        'default' => '{general_legend},name,source,topic_id'
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
            'label' => &$GLOBALS['TL_LANG']['tl_audios']['name'],
            'search' => true,
            'inputType' => 'text',
            'eval' => array('mandatory' => true, 'maxlength' => 64),
            'sql' => "varchar(64) NOT NULL default ''"
        ),
        'source' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_audios']['source'],
            'inputType' => 'fileTree',
            'eval' => ['filesOnly' => true, 'fieldType' => 'radio'],
            'sql' => "binary(16) NULL",
        ),
        'topic_id' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_audios']['topic_id'],
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
