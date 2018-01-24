<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('BZGA.ableplayer', 'PiVideoplayer', [
    'Videoplayer' => 'list,overview,detail',
], [
    'Videoplayer' => 'overview'
]);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']['ableplayer_div'] = \BZGA\Ableplayer\Div::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']['ableplayer_vimeo'] = \BZGA\Ableplayer\Hooks\VimeoProcessDatamap::class;

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['list_type_Info']['ableplayer_pivideoplayer']['ableplayer'] = \BZGA\Ableplayer\Hooks\CmsLayout::class . '->getExtensionSummary';
