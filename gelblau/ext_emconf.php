<?php

/**
 * Extension Manager/Repository config file for ext "gelblau".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'gelblau',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.99',
            'fluid_styled_content' => '8.7.0-8.7.99',
            'rte_ckeditor' => '8.7.0-8.7.99'
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Gelblau\\Gelblau\\' => 'Classes'
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Bogdan Bondar',
    'author_email' => 'bondarbogdann@gmail.com',
    'author_company' => 'gelblau',
    'version' => '1.0.0',
];
