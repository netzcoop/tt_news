<?php
// ******************************************************************
// This is the standard TypoScript news category table, tt_news_cat
// ******************************************************************
return [
    'ctrl' => [
        'title' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xlf:tt_news_cat',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'delete' => 'deleted',
        'default_sortby' => 'ORDER BY uid',
        'treeParentField' => 'parent_category',
        'dividers2tabs' => true,
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ],
        'hideAtCopy' => true,
        'mainpalette' => '2,10',
        'crdate' => 'crdate',
        'iconfile' => 'EXT:tt_news/Resources/Public/Images/Icons/tt_news_cat.gif',
        'searchFields' => 'uid,title'
    ],
    'interface' => [
        'showRecordFieldList' => 'title,image,shortcut,shortcut_target'
    ],
    'columns' => [
        'title' => [
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.title',
            'config' => [
                'type' => 'input',
                'size' => '40',
                'max' => '256',
                'eval' => 'required'
            ]
        ],
        'title_lang_ol' => [
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xlf:tt_news_cat.title_lang_ol',
            'config' => [
                'type' => 'input',
                'size' => '40',
                'max' => '256',

            ]
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ]
        ],
        'fe_group' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 5,
                'maxitems' => 20,
                'items' => [
                    ['LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login', -1],
                    ['LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.any_login', -2],
                    ['LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.usergroups', '--div--']
                ],
                'exclusiveKeys' => '-1,-2',
                'foreign_table' => 'fe_groups'
            ]
        ],
        'starttime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0
            ]
        ],
        'endtime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ]
        ],
        'parent_category' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xlf:tt_news_cat.parent_category',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tt_news_cat',
                'foreign_table_where' => ' ORDER BY tt_news_cat.title ASC',
                'size' => 10,
                'autoSizeMax' => 50,
                'minitems' => 0,
                'maxitems' => 1,
                'renderType' => 'selectTree',
                'treeConfig' => [
                    'parentField' => 'parent_category',
                    'dataProvider' => \RG\TtNews\Tree\TableConfiguration\NewsDatabaseTreeDataProvider::class,
                    'appearance' => [
                        'showHeader' => true,
                        'width' => 400
                    ],
                ]
            ]
        ],
        'image' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xlf:tt_news_cat.image',
            'config' => [
                'type' => 'group',
                'internal_type' => 'file',
                'allowed' => 'gif,png,jpeg,jpg',
                'max_size' => 1024,
                'uploadfolder' => 'uploads/pics',
                'show_thumbs' => 1,
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ]
        ],
        'shortcut' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xlf:tt_news_cat.shortcut',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => '1',
                'maxitems' => '1',
                'minitems' => '0',
                'show_thumbs' => '1',
				'default' => 0,
            ]
        ],
        'shortcut_target' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xlf:tt_news_cat.shortcut_target',
            'config' => [
                'type' => 'input',
                'size' => '10',
                'checkbox' => '',
                'eval' => 'trim',
                'max' => '40'
            ]
        ],
        'single_pid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xlf:tt_news_cat.single_pid',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => '1',
                'maxitems' => '1',
                'minitems' => '0',
                'show_thumbs' => '1',
				'default' => 0,
            ]
        ],
        'description' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xlf:tt_news_cat.description',
            'config' => [
                'type' => 'text',
                'cols' => '40',
                'rows' => '3'
            ]
        ],
    ],

    'types' => [
        '0' => [
            'showitem' => '
			--palette--;;title,parent_category,
			--div--;LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xlf:tt_news.tabs.special, image,--palette--;;shortcut,single_pid,description;;;;1-1-1,
			--div--;LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xlf:tt_news.tabs.access, hidden,starttime,endtime,fe_group,
			--div--;LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xlf:tt_news.tabs.extended,
		'
        ],

    ],
    'palettes' => [
        'title' => [
            'showitem' => 'title,--linebreak--,title_lang_ol'
        ],
        'shortcut' => [
            'showitem' => 'shortcut,--linebreak--,shortcut_target'
        ],
    ]
];

