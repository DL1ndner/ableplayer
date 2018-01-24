<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'ableplayer_pivideoplayer',
    'FILE:EXT:ableplayer/Configuration/FlexForm/Video.xml'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ableplayer_domain_model_video');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ableplayer_video_content');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'ableplayer',
    'Configuration/TypoScript/Videoplayer',
    'AblePlayer'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('ableplayer', 'PiVideoplayer', 'Videoplayer');

if (TYPO3_MODE == 'BE') {
    $GLOBALS['TBE_MODULES_EXT']['xMOD_db_new_content_el']['addElClasses'][\BZGA\Ableplayer\Wizicon::class] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('ableplayer') . 'Classes/Wizicon.php';
}
