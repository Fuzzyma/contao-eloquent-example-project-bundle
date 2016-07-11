<?php

/**
 * Table tl_tag_topic
 */
$GLOBALS['TL_DCA']['tl_tag_topic'] = array
(

    // Config
    'config' => array
    (
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary'
            )
        )
    ),

    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tag_id' => array(
            'sql' => "int(10) unsigned NULL"
        ),
        'topic_id' => array(
            'sql' => "int(10) unsigned NULL"
        )
    )
);
