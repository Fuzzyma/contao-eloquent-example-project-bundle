<?php


/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD'], 0, [
    'testProject' => [
        'topics' => [
            'tables' => ['tl_topics']
        ],
        'tags' => [
            'tables' => ['tl_tags']
        ],
        'infos' => [
            'tables' => ['tl_infos']
        ],
        'audios' => [
            'tables' => ['tl_audios']
        ]
    ]
]);