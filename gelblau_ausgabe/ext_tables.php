<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Gelblau.GelblauAusgabe',
            'Ausgabe',
            'Ausgabe'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('gelblau_ausgabe', 'Configuration/TypoScript', 'Gelblau Ausgabe');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_gelblauausgabe_domain_model_ausgabe', 'EXT:gelblau_ausgabe/Resources/Private/Language/locallang_csh_tx_gelblauausgabe_domain_model_ausgabe.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_gelblauausgabe_domain_model_ausgabe');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_gelblauausgabe_domain_model_order', 'EXT:gelblau_ausgabe/Resources/Private/Language/locallang_csh_tx_gelblauausgabe_domain_model_order.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_gelblauausgabe_domain_model_order');

    }
);
