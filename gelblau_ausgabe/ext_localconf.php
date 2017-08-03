<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Gelblau.GelblauAusgabe',
            'Ausgabe',
            [
                'Ausgabe' => 'list, show, download',
                'Order' => 'new, create'
            ],
            // non-cacheable actions
            [
                'Ausgabe' => 'download',
                'Order' => 'create'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    ausgabe {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('gelblau_ausgabe') . 'Resources/Public/Icons/user_plugin_ausgabe.svg
                        title = LLL:EXT:gelblau_ausgabe/Resources/Private/Language/locallang_db.xlf:tx_gelblau_ausgabe_domain_model_ausgabe
                        description = LLL:EXT:gelblau_ausgabe/Resources/Private/Language/locallang_db.xlf:tx_gelblau_ausgabe_domain_model_ausgabe.description
                        tt_content_defValues {
                            CType = list
                            list_type = gelblauausgabe_ausgabe
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
