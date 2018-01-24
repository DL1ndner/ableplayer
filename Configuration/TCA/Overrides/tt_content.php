<?php

// column
$GLOBALS['TCA']['tt_content']['columns']['tx_ableplayer_videos'] = [
    'exclude' => 0,
    'label'   => 'LLL:EXT:ableplayer/Resources/Private/Language/locallang.xml:videos',
    'config'  => [
        'type'             => 'inline',
        'foreign_table'    => 'tx_ableplayer_video_content',
        'foreign_field'    => 'content_uid',
        'foreign_label'    => 'video_uid',
        'foreign_sortby'   => 'sorting',
        'foreign_selector' => 'video_uid',
        'foreign_unique'   => 'video_uid',
        'maxitems'         => '100',
        'appearance'       => [
            'collapseAll'     => false, // working RTE in TYPO3 > 7.4?!?!
            'expandSingle'    => true,
            'useCombination'  => 1,
            'useSortable'     => true,
            'enabledControls' => [
                'info' => TRUE,
                'new' => TRUE,
                'dragdrop' => TRUE,
                'sort' => TRUE,
                'hide' => TRUE,
                'delete' => TRUE,
                'localize' => TRUE,
            ],
        ],
    ],
];

$storageId = \BZGA\Ableplayer\Div::getGeneralStorageFolder();
if ($storageId) {
    unset($GLOBALS['TCA']['tt_content']['columns']['tx_ableplayer_videos']['config']['foreign_selector']);
    unset($GLOBALS['TCA']['tt_content']['columns']['tx_ableplayer_videos']['config']['foreign_unique']);
}

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['ableplayer_pivideoplayer'] = 'layout,select_key,pages,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['ableplayer_pivideoplayer'] = 'pi_flexform,tx_ableplayer_videos';
