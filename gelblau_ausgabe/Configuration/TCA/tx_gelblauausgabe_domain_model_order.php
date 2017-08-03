<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:gelblau_ausgabe/Resources/Private/Language/locallang_db.xlf:tx_gelblauausgabe_domain_model_order',
        'label' => 'date',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'date,money,invoice,ausgabe_amount,client_name,client_email,client_address,ausgabe',
        'iconfile' => 'EXT:gelblau_ausgabe/Resources/Public/Icons/tx_gelblauausgabe_domain_model_order.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, date, money, invoice, ausgabe_amount, client_name, client_email, client_address, ausgabe',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, date, money, invoice, ausgabe_amount, client_name, client_email, client_address, ausgabe, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_gelblauausgabe_domain_model_order',
                'foreign_table_where' => 'AND tx_gelblauausgabe_domain_model_order.pid=###CURRENT_PID### AND tx_gelblauausgabe_domain_model_order.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gelblau_ausgabe/Resources/Private/Language/locallang_db.xlf:tx_gelblauausgabe_domain_model_order.date',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'size' => 7,
                'eval' => 'date',
                'default' => '0000-00-00'
            ],
        ],
        'money' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gelblau_ausgabe/Resources/Private/Language/locallang_db.xlf:tx_gelblauausgabe_domain_model_order.money',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'invoice' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gelblau_ausgabe/Resources/Private/Language/locallang_db.xlf:tx_gelblauausgabe_domain_model_order.invoice',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
        ],
        'ausgabe_amount' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gelblau_ausgabe/Resources/Private/Language/locallang_db.xlf:tx_gelblauausgabe_domain_model_order.ausgabe_amount',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'client_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gelblau_ausgabe/Resources/Private/Language/locallang_db.xlf:tx_gelblauausgabe_domain_model_order.client_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'client_email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gelblau_ausgabe/Resources/Private/Language/locallang_db.xlf:tx_gelblauausgabe_domain_model_order.client_email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'client_address' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gelblau_ausgabe/Resources/Private/Language/locallang_db.xlf:tx_gelblauausgabe_domain_model_order.client_address',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'ausgabe' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gelblau_ausgabe/Resources/Private/Language/locallang_db.xlf:tx_gelblauausgabe_domain_model_order.ausgabe',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_gelblauausgabe_domain_model_ausgabe',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
    
    ],
];
