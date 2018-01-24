<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "ableplayer".
 *
 * Auto generated 18-05-2015 11:08
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title'        => 'AblePlayer',
    'description'  => 'A video extension for TYPO3 built on the VideoJS HTML5 video player library. Based on htmlvideoplayer by Tim Lochmüller and Ableplayer by Terrill Thompson. Allows you to embed video in your website using HTML5 with Flash fallback support for non-HTML5 browsers. Work on VideoJS 4.12.6 and support YouTube and Vimeo video in the same style.',
    'category'     => 'plugin',
    'version'      => '1.0.0',
    'state'        => 'alpha',
    'author'       => 'Dominik Lindner',
    'author_email' => 'dominik.lindner@bzga.de',
    'constraints'  => [
        'depends' => [
            'typo3' => '7.6.0-8.7.99',
            'php'   => '5.6.0-0.0.0',
        ],
    ],
];
