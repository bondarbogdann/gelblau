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

$GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFound_handling'] = '/404/';

// $GLOBALS['TYPO3_CONF_VARS']['BE']['compressionLevel'] = 9;
// $GLOBALS['TYPO3_CONF_VARS']['FE']['compressionLevel'] = 9;

// $GLOBALS['TYPO3_CONF_VARS']['SYS']['enableDeprecationLog'] = '0';
// $GLOBALS['TYPO3_CONF_VARS']['SYS']['syslogErrorReporting'] = '0';
// $GLOBALS['TYPO3_CONF_VARS']['SYS']['belogErrorReporting'] = '0';
// $GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLogLevel'] = '4';
// $GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug'] = false;
// $GLOBALS['TYPO3_CONF_VARS']['SYS']['no_pconnect'] = '1';
// $GLOBALS['TYPO3_CONF_VARS']['BE']['versionNumberInFilename'] = '1';
