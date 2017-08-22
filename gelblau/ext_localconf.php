<?php
defined('TYPO3_MODE') || die();

/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['gelblau'] = 'EXT:gelblau/Configuration/RTE/Default.yaml';

// Register content element icons
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'tx_gelblau_gelblau_main_header',
    \TYPO3\CMS\Core\Imaging\IconProvider\FontawesomeIconProvider::class,
    [
        'name' => 'header',
    ]
);
$iconRegistry->registerIcon(
    'tx_gelblau_gelblau_partners',
    \TYPO3\CMS\Core\Imaging\IconProvider\FontawesomeIconProvider::class,
    [
        'name' => 'glass',
    ]
);
$iconRegistry->registerIcon(
    'tx_gelblau_gelblau_team',
    \TYPO3\CMS\Core\Imaging\IconProvider\FontawesomeIconProvider::class,
    [
        'name' => 'user',
    ]
);
$iconRegistry->registerIcon(
    'tx_gelblau_gelblau_text',
    \TYPO3\CMS\Core\Imaging\IconProvider\FontawesomeIconProvider::class,
    [
        'name' => 'text-width',
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:gelblau/Configuration/PageTS/NewContentElementWizard.txt">'
);
// Add backend preview hook
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['gelblau'] = 
    Gelblau\Gelblau\Hooks\PageLayoutViewDrawItem::class;
