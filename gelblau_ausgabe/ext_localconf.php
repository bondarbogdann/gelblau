<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Gelblau.GelblauAusgabe',
            'Ausgabe',
            [
                'Ausgabe' => 'list, show, download, latest',
                'Order' => 'new, create'
            ],
            // non-cacheable actions
            [
                'Ausgabe' => 'download',
                'Order' => 'create'
            ]
        );

        // Register plugin icon
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'ausgabe_icon',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:gelblau_ausgabe/Resources/Public/Icons/15905-200.png']
    );
    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    ausgabe {
                        iconIdentifier = ausgabe_icon
                        title = LLL:EXT:gelblau_ausgabe/Resources/Private/Language/locallang_db.xlf:tx_gelblauausgabe_domain_model_ausgabe
                        description = LLL:EXT:gelblau_ausgabe/Resources/Private/Language/locallang_db.xlf:tx_gelblauausgabe_domain_model_ausgabe.description
                        tt_content_defValues {
                            CType = list
                            list_type = gelblauausgabe_ausgabe
                        }
                    }
                }
                show = ausgabe
            }
       }'
    );
    }
);
