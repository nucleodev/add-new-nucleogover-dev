<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Grid_1{
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes($default = false) {

        $attributes = array(
            'blockId' => [
                'type' => 'string',
                'default' => '',
            ],
            'previewImg' => [
                'type' => 'string',
                'default' => '',
            ],
            /*============================
                Layout
            ============================*/
            'layout' => [
                'type' => 'string',
                'default' => 'layout1',
            ],
            /*============================
                Query Setting
            ============================*/
            'queryQuick' => [
                'type' => 'string',
                'default' => '',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts', 'archiveBuilder')]
                        ]
                    ],
                ],
            ],
            'queryNumPosts' => [
                'type' => 'object',
                'default' => (object)['lg'=>4],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts')]
                        ]
                    ],
                ],
            ],
            'queryNumber' => [ // for compatibility since v.2.5.4
                'type' => 'string',
                'default' =>4,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts', 'archiveBuilder')]
                        ]
                    ],
                ],
            ],
            'queryType' => [
                'type' => 'string',
                'default' => 'post'
            ],
            'queryTax' => [
                'type' => 'string',
                'default' => 'category',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts', 'archiveBuilder')]
                        ]
                    ],
                ],
            ],
            'queryTaxValue' => [
                'type' => 'string',
                'default' => '[]',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryTax','condition' => '!=','value' => ''],
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts', 'archiveBuilder')]
                        ]
                    ],
                ],
            ],
            'queryRelation' => [
                'type' => 'string',
                'default' => 'OR',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryTaxValue','condition' => '!=','value' => '[]'],
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts', 'archiveBuilder')]
                        ]
                    ],
                ],
            ],
            'queryOrderBy' => [
                'type' => 'string',
                'default' => 'date',
            ],
            'metaKey' => [
                'type' => 'string',
                'default' => 'custom_meta_key',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryOrderBy','condition' => '==','value' => 'meta_value_num'],
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts', 'archiveBuilder')]
                        ]
                    ],
                ],
            ],
            'queryOrder' => [
                'type' => 'string',
                'default' => 'desc',
            ],
            // Include Remove from Version 2.5.4
            'queryInclude' => [
                'type' => 'string',
                'default' => '',
            ],
            'queryExclude' => [
                'type' => 'string',
                'default' => '[]',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts', 'archiveBuilder')]
                        ]
                    ],
                ],
            ],
            'queryAuthor' => [
                'type' => 'string',
                'default' => '[]',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts', 'archiveBuilder')]
                        ]
                    ],
                ],
            ],
            'queryOffset' => [
                'type' => 'string',
                'default' => '0',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts', 'archiveBuilder')]
                        ]
                    ],
                ],
            ],
            'queryExcludeTerm' => [
                'type' => 'string',
                'default' => '[]',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts', 'archiveBuilder')]
                        ]
                    ],
                ],
            ],
            'queryExcludeAuthor' => [
                'type' => 'string',
                'default' => '[]',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts', 'archiveBuilder')]
                        ]
                    ],
                ],
            ],
            'querySticky' => [
                'type' => 'boolean',
                'default' => true,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts', 'archiveBuilder')]
                        ]
                    ],
                ],
            ],
            'queryUnique' => [
                'type' => 'string',
                'default' => '',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryType','condition' => '!=','value' => array('customPosts', 'posts')]
                        ]
                    ],
                ],
            ],
            'queryPosts' => [
                'type' => 'string',
                'default' => '[]',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryType','condition' => '==','value' => 'posts']
                        ]
                    ],
                ],
            ],
            'queryCustomPosts' => [
                'type' => 'string',
                'default' => '[]',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'queryType','condition' => '==','value' => 'customPosts']
                        ]
                    ],
                ],
            ],
            /*============================
                General Setting
            ============================*/
            'gridStyle' => [
                'type' => 'string',
                'default' => 'style1',
            ],
            'columns' => [
                'type' => 'object',
                'default' => (object)['lg' =>'2'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'gridStyle','condition'=>'==','value'=>['style1', 'style2']],
                        ],
                        'selector'=>'{{ULTP}}.wp-block-ultimate-post-post-grid-1 .ultp-block-row.ultp-block-items-wrap { grid-template-columns: repeat({{columns}}, 1fr); }'
                    ],
                ],
            ],
            'columnGridGap' => [
                'type' => 'object',
                'default' => (object)['lg' =>'30', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-row { grid-column-gap: {{columnGridGap}}; }'
                    ],
                ],
            ],
            'rowSpace' => [
                'type' => 'object',
                'default' => (object)['lg'=>'30'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'separatorShow','condition'=>'!=','value'=> true]
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-row {row-gap: {{rowSpace}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'separatorShow','condition'=>'==','value'=> true]
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-item { padding-bottom: {{rowSpace}}px; margin-bottom:{{rowSpace}}px; }'
                    ],
                ],
            ],
            'titleShow' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'titleStyle' => [
                'type' => 'string',
                'default' => 'none',
            ],
            'titleAnimColor' => [ 
                'type' => 'string',
                'default' => 'black',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleStyle','condition'=>'==','value'=>'style1']
                        ],
                        'selector'=>'{{ULTP}} .ultp-title-style1 a { 
                            cursor: pointer;
                            text-decoration: none;
                            display: inline;
                            padding-bottom: 2px;
                            transition: all 0.35s linear !important;
                            background: linear-gradient(
                              to bottom,
                              {{titleAnimColor}} 0%,
                              {{titleAnimColor}} 98%
                            );      
                            background-size: 0px 2px;
                            background-repeat: no-repeat;
                            background-position: left 100%;
                           }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleStyle','condition'=>'==','value'=>'style2']
                        ],
                        'selector'=>'{{ULTP}} .ultp-title-style2 a:hover { 
                            border-bottom:none;
                            padding-bottom: 2px;
                            background-position:0 100%;
                            background-repeat: repeat;
                            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg id=\'squiggle-link\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' xmlns:ev=\'http://www.w3.org/2001/xml-events\' viewBox=\'0 0 10 18\'%3E%3Cstyle type=\'text/css\'%3E.squiggle%7Banimation:shift .5s linear infinite;%7D@keyframes shift %7Bfrom %7Btransform:translateX(-10px);%7Dto %7Btransform:translateX(0);%7D%7D%3C/style%3E%3Cpath fill=\'none\' stroke=\'{{titleAnimColor}}\' stroke-width=\'1\' class=\'squiggle\' d=\'M0,17.5 c 2.5,0,2.5,-1.5,5,-1.5 s 2.5,1.5,5,1.5 c 2.5,0,2.5,-1.5,5,-1.5 s 2.5,1.5,5,1.5\' /%3E%3C/svg%3E");
                        }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleStyle','condition'=>'==','value'=>'style3']
                        ],
                        'selector'=>'{{ULTP}} .ultp-title-style3 a { 
                            text-decoration: none;
                            $thetransition: all 1s cubic-bezier(1,.25,0,.75) 0s;
                            position: relative;
                            transition: all 0.35s ease-out;
                            padding-bottom: 3px;
                            border-bottom:none;
                            padding-bottom: 2px;
                            background-position:0 100%;
                            background-repeat: repeat;
                            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg id=\'squiggle-link\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' xmlns:ev=\'http://www.w3.org/2001/xml-events\' viewBox=\'0 0 10 18\'%3E%3Cstyle type=\'text/css\'%3E.squiggle%7Banimation:shift .5s linear infinite;%7D@keyframes shift %7Bfrom %7Btransform:translateX(-10px);%7Dto %7Btransform:translateX(0);%7D%7D%3C/style%3E%3Cpath fill=\'none\' stroke=\'{{titleAnimColor}}\' stroke-width=\'1\' class=\'squiggle\' d=\'M0,17.5 c 2.5,0,2.5,-1.5,5,-1.5 s 2.5,1.5,5,1.5 c 2.5,0,2.5,-1.5,5,-1.5 s 2.5,1.5,5,1.5\' /%3E%3C/svg%3E");
                        }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleStyle','condition'=>'==','value'=>'style4']
                        ],
                        'selector'=>'{{ULTP}} .ultp-title-style4 a {
                            cursor: pointer;
                            font-weight: 600;
                            text-decoration: none;
                            display: inline;
                            padding-bottom: 2px;
                            transition: all 0.3s linear !important;
                            background: linear-gradient(
                              to bottom,
                              {{titleAnimColor}} 0%,
                              {{titleAnimColor}} 98%
                            );      
                            background-size: 100% 2px;
                            background-repeat: no-repeat;
                            background-position: left 100%;
                        }'
                        ]  ,
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleStyle','condition'=>'==','value'=>'style5']
                        ],
                        'selector'=>'{{ULTP}} .ultp-title-style5 a:hover{
                            text-decoration: none;
                            transition: all 0.35s ease-out;
                            border-bottom:none;
                            padding-bottom: 2px;
                            background-position:0 100%;
                            background-repeat: repeat;
                            background-size:auto;
                            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg id=\'squiggle-link\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' xmlns:ev=\'http://www.w3.org/2001/xml-events\' viewBox=\'0 0 10 18\'%3E%3Cstyle type=\'text/css\'%3E.squiggle%7Banimation:shift .5s linear infinite;%7D@keyframes shift %7Bfrom %7Btransform:translateX(-10px);%7Dto %7Btransform:translateX(0);%7D%7D%3C/style%3E%3Cpath fill=\'none\' stroke=\'{{titleAnimColor}}\' stroke-width=\'1\' class=\'squiggle\' d=\'M0,17.5 c 2.5,0,2.5,-1.5,5,-1.5 s 2.5,1.5,5,1.5 c 2.5,0,2.5,-1.5,5,-1.5 s 2.5,1.5,5,1.5\' /%3E%3C/svg%3E");
                         } '
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleStyle','condition'=>'==','value'=>'style5']
                        ],
                        'selector'=>'{{ULTP}} .ultp-title-style5 a {
                            cursor: pointer;
                            text-decoration: none;
                            display: inline;
                            padding-bottom: 2px;
                            transition: all 0.3s linear !important;
                            background: linear-gradient(
                              to bottom,
                              {{titleAnimColor}} 0%,
                              {{titleAnimColor}} 98%
                            );      
                            background-size: 100% 2px;
                            background-repeat: no-repeat;
                            background-position: left 100%;
                        }'
                        ],
                        (object)[
                            'depends' => [
                                (object)['key'=>'titleStyle','condition'=>'==','value'=>'style6']
                            ],
                            'selector'=>'{{ULTP}} .ultp-title-style6  a{
                                background-image: linear-gradient(120deg, {{titleAnimColor}} 0%, {{titleAnimColor}} 100%);
                                background-repeat: no-repeat;
                                background-size: 100% 2px;
                                background-position: 0 88%;
                                transition: background-size 0.15s ease-in;
                                padding: 5px 5px;
                            }'
                            ],
                            (object)[
                                'depends' => [
                                    (object)['key'=>'titleStyle','condition'=>'==','value'=>'style7']
                                ],
                                'selector'=>'{{ULTP}} .ultp-title-style7  a {
                                    cursor: pointer;
                                    text-decoration: none;
                                    display: inline;
                                    padding-bottom: 2px;
                                    transition: all 0.3s linear !important;
                                    background: linear-gradient(
                                      to bottom,
                                      {{titleAnimColor}} 0%,
                                      {{titleAnimColor}} 98%
                                    );      
                                    background-size: 0px 2px;
                                    background-repeat: no-repeat;
                                    background-position: right 100%;
                                 } '
                            ],
                            (object)[
                                'depends' => [
                                    (object)['key'=>'titleStyle','condition'=>'==','value'=>'style8']
                                ],
                                'selector'=>'{{ULTP}} .ultp-title-style8  a {
                                    cursor: pointer;
                                    text-decoration: none;
                                    display: inline;
                                    padding-bottom: 2px;
                                    transition: all 0.3s linear !important;
                                    background: linear-gradient(
                                      to bottom,
                                      {{titleAnimColor}} 0%,
                                      {{titleAnimColor}} 98%
                                    );      
                                    background-size: 0px 2px;
                                    background-repeat: no-repeat;
                                    background-position: center 100%;
                                 } '
                            ],
                            (object)[
                                'depends' => [
                                    (object)['key'=>'titleStyle','condition'=>'==','value'=>'style9']
                                ],
                                'selector'=>'{{ULTP}} .ultp-title-style9  a {
                                    background-image: linear-gradient(120deg,{{titleAnimColor}}  0%, {{titleAnimColor}} 100%);
                                    background-repeat: no-repeat;
                                    background-size: 100% 10px;
                                    background-position: 0 88%;
                                    transition: 0.3s ease-in;
                                    padding: 3px 5px;
                                 } '
                            ]
                    ],
            ],

            'headingShow' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'excerptShow' => [
                'type' => 'boolean',
                'default' => true
            ],
            'catShow' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'metaShow' => [
               'type' => 'boolean',
                'default' => true,
            ],
            'showImage' => [
               'type' => 'boolean',
                'default' => true,
            ],
            'filterShow' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'queryType','condition'=>'!=','value'=>['posts','customPosts']],
                        ],
                    ],
                ]
            ],
            'paginationShow' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'readMore' => [
                'type' => 'boolean',
                'default' => false,
            ],
            'equalHeight' => [
                'type' => 'boolean',
                'default' => true,
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-content-wrap { height: 100%; }'
                    ]
                ],
            ],
            'contentTag' => [
                'type' => 'string',
                'default' => 'div',
            ],
            'openInTab' => [
                'type' => 'boolean',
                'default' => false,
            ],
            'notFoundMessage' => [
                'type' => 'string',
                'default' => 'No Post Found'
            ],

            /*============================
                Heading Setting/Style
            ============================*/
            'headingText' => [
                'type' => 'string',
                'default' => 'Post Grid #1',
            ],
            'headingURL' => [
                'type' => 'string',
                'default' => '',
            ],
            'headingBtnText' => [
                'type' => 'string',
                'default' =>  'View More',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style11'],
                        ],
                    ],
                ],
            ],
            'headingStyle' => [
                'type' => 'string',
                'default' => 'style9',
            ],
            'headingTag' => [
                'type' => 'string',
                'default' => 'h2',
            ],
            'headingAlign' => [
                'type' => 'string',
                'default' =>  'left',
                'style' => [(object)['selector' => '{{ULTP}} .ultp-heading-inner, {{ULTP}} .ultp-sub-heading-inner{ text-align:{{headingAlign}}; }']]
            ],
            'headingTypo' => [
                'type' => 'object',
                'default' =>  (object)['openTypography' => 1,'size' => (object)['lg' => '20', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => 'none', 'transform' => '', 'family'=>'','weight'=>'700'],
                'style' => [(object)['selector' => '{{ULTP}} .ultp-heading-wrap .ultp-heading-inner']]
            ],
            'headingColor' => [
                'type' => 'string',
                'default' =>  '#0e1523',
                'style' => [(object)['selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { color:{{headingColor}}; }']],
            ],
            'headingBorderBottomColor' => [
                'type' => 'string',
                'default' =>  '#0e1523',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style3'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner { border-bottom-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style4'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner { border-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style6'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span:before { background-color: {{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style7'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span:before, {{ULTP}} .ultp-heading-inner span:after { background-color: {{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style8'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:after { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style9'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:before { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style10'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:before { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style13'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner { border-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style14'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:before { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style15'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span:before { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style16'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span:before { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style17'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:before { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style18'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:after { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style19'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:before { border-color:{{headingBorderBottomColor}}; }'
                    ],
                ],
            ],
            'headingBorderBottomColor2' => [
                'type' => 'string',
                'default' =>  '#e5e5e5',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style8'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:before { background-color:{{headingBorderBottomColor2}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style10'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:after { background-color:{{headingBorderBottomColor2}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style14'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:after { background-color:{{headingBorderBottomColor2}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style19'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:after { background-color:{{headingBorderBottomColor2}}; }'
                    ],
                ],
            ],
            'headingBg' => [
                'type' => 'string',
                'default' =>  '#037fff',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style5'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-style5 .ultp-heading-inner span:before { border-color:{{headingBg}} transparent transparent; } {{ULTP}} .ultp-heading-inner span { background-color:{{headingBg}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style2'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span { background-color:{{headingBg}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style21'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span, {{ULTP}} .ultp-heading-inner span:after { background-color:{{headingBg}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style3'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span { background-color:{{headingBg}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style12'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span { background-color:{{headingBg}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style13'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span { background-color:{{headingBg}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style18'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner { background-color:{{headingBg}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style20'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span:before { border-color:{{headingBg}} transparent transparent; } {{ULTP}} .ultp-heading-inner { background-color:{{headingBg}}; }'
                    ],
                ],
            ],
            'headingBg2' => [
                'type' => 'string',
                'default' =>  '#e5e5e5',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style12'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner { background-color:{{headingBg2}}; }'
                    ],
                ],
            ],
            'headingBtnTypo' => [
                'type' => 'object',
                'default' =>  (object)['openTypography' => 1,'size' => (object)['lg' => '14', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => 'none','family'=>''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style11'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-wrapper .ultp-heading-wrap .ultp-heading-btn'
                    ],
                ],
            ],
            'headingBtnColor' => [
                'type' => 'string',
                'default' =>  '#037fff',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style11'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-btn { color:{{headingBtnColor}}; } {{ULTP}} .ultp-heading-wrap .ultp-heading-btn svg { fill:{{headingBtnColor}}; }'
                    ],
                ],
            ],
            'headingBtnHoverColor' => [
                'type' => 'string',
                'default' =>  '#0a31da',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style11'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-btn:hover { color:{{headingBtnHoverColor}}; } {{ULTP}} .ultp-heading-wrap .ultp-heading-btn:hover svg { fill:{{headingBtnHoverColor}}; }'
                    ],
                ],
            ],
            
            'headingBorder' => [
                'type' => 'string',
                'default' => '3',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style3'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner { border-bottom-width:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style4'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner { border-width:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style6'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span:before { width:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style7'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span:before, {{ULTP}} .ultp-heading-inner span:after { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style8'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:before, {{ULTP}} .ultp-heading-inner:after { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style9'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:before { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style10'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:before, {{ULTP}} .ultp-heading-inner:after { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style13'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner { border-width:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style14'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:before, {{ULTP}} .ultp-heading-inner:after { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style15'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span:before { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style16'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span:before { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style17'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:before { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style19'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:after { width:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style18'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner:after { width:{{headingBorder}}px; }'
                    ],
                ],
            ],
            'headingSpacing' => [
                'type' => 'object',
                'default' => (object)['lg'=>20, 'sm'=>10, 'unit'=>'px'],
                'style' => [(object)['selector'=>'{{ULTP}} .ultp-heading-wrap {margin-top:0; margin-bottom:{{headingSpacing}}; }']]
            ],

            'headingRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style2'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style3'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style4'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style5'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style12'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style13'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style18'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style20'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner { border-radius:{{headingRadius}}; }'
                    ],
                ]
            ],


            'headingPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style2'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style3'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style4'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style5'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style6'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style12'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style13'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style18'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style19'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style20'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-wrap .ultp-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style21'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                ]
            ],
            'subHeadingShow' => [
                'type' => 'boolean',
                'default' => false,
            ],
            'subHeadingText' => [
                'type' => 'string',
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut sem augue. Sed at felis ut enim dignissim sodales.',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'subHeadingShow','condition'=>'==','value'=>true],
                        ],
                    ],
                ],
            ],
            'subHeadingTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography'=>1,'size'=>(object)['lg'=>'16', 'unit'=>'px'], 'spacing'=>(object)[ 'lg'=>'0', 'unit'=>'px'], 'height'=>(object)[ 'lg'=>'27', 'unit'=>'px'],'decoration'=>'none','transform' => '','family'=>'','weight'=>'500'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'subHeadingShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-sub-heading div'
                    ],
                ],
            ],
            'subHeadingColor' => [
                'type' => 'string',
                'default' =>  '#989898',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'subHeadingShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-sub-heading div{ color:{{subHeadingColor}}; }'
                    ],
                ],
            ],
            'subHeadingSpacing' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '8', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'subHeadingShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} div.ultp-sub-heading-inner{ margin:{{subHeadingSpacing}}; }'
                    ],
                ],
            ],

            /*============================
                Title Setting/Style
            ============================*/
            'titleTag' => [
                'type' => 'string',
                'default' => 'h3',
            ],
            'titlePosition' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'titleColor' => [
                'type' => 'string',
                'default' => '#0e1523',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-content .ultp-block-title a { color:{{titleColor}} !important; }'
                    ],
                ],
            ],
            'titleHoverColor' => [
                'type' => 'string',
                'default' => '#828282',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-content .ultp-block-title a:hover { color:{{titleHoverColor}} !important; }'
                    ],
                ],
            ],
            'titleTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography'=>1,'size'=>(object)['lg'=>'22', 'unit'=>'px'], 'spacing'=>(object)[ 'lg'=>'0', 'unit'=>'px'], 'height'=>(object)['lg'=>'26', 'unit'=>'px'],'transform' => '', 'decoration'=>'none','family'=>'','weight'=>'500'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-items-wrap .ultp-block-item .ultp-block-title, {{ULTP}} .ultp-block-items-wrap .ultp-block-item .ultp-block-title a'
                    ],
                ],
            ],
            'titlePadding' => [
                'type' => 'object',
                'default' => (object)['lg'=>(object)['top'=>10,'bottom'=>5, 'unit'=>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-content .ultp-block-title { padding:{{titlePadding}}; }'
                    ],
                ],
            ],
            'titleLength' => [
                'type' => 'string',
                'default' => 0,
            ],

            /*============================
                Content Setting/Style
            ============================*/
            'showSeoMeta' => [
                'type' => 'boolean',
                'default'=> false
            ],
            'showFullExcerpt' => [
                'type' => 'boolean',
                'default' => false,
            ],
            'excerptLimit' => [
                'type' => 'string',
                'default' => 30,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showFullExcerpt','condition'=>'==','value'=>false]
                        ],
                    ],
                ],
            ],
            'excerptColor' => [
                'type' => 'string',
                'default' => '#777',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'excerptShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-excerpt { color:{{excerptColor}}; }'
                    ],
                ],
            ],
            'excerptTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography' => 1,'size' => (object)['lg' =>14, 'unit' =>'px'],'height' => (object)['lg' =>26, 'unit' =>'px'], 'decoration' => 'none','family'=>''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'excerptShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-excerpt, {{ULTP}} .ultp-block-excerpt p'
                    ],
                ],
            ],
            'excerptPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => 10,'bottom' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'excerptShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-excerpt{ padding: {{excerptPadding}}; }'
                    ],
                ],
            ],

            /*============================
                Category Setting/Style
            ============================*/
            'maxTaxonomy'=> [
                'type' => 'string',
                'default' => '30',
            ],
            'taxonomy' => [
                'type' => 'string',
                'default' => 'category'
            ],
            'catStyle' => [
                'type' => 'string',
                'default' => 'classic',
            ],
            'catPosition' => [
                'type' => 'string',
                'default' => 'aboveTitle',
            ],
            'customCatColor' => [
                'type' => 'boolean',
                'default' => false,
            ],
            'seperatorLink' => [
                'type' => 'string',
                'default' => admin_url( 'edit-tags.php?taxonomy=category' ),
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'customCatColor','condition'=>'==','value'=>true],
                        ]
                    ]
                ]
            ],
            'onlyCatColor' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'customCatColor','condition'=>'==','value'=>true],
                        ]
                    ]
                ]
            ],
            'catLineWidth' => [
                'type' => 'object',
                'default' => (object)['lg'=>'20'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'catStyle','condition'=>'!=','value'=>'classic'],
                        ],
                        'selector' => '{{ULTP}} .ultp-category-borderRight .ultp-category-in:before, {{ULTP}} .ultp-category-borderBoth .ultp-category-in:before, {{ULTP}} .ultp-category-borderBoth .ultp-category-in:after, {{ULTP}} .ultp-category-borderLeft .ultp-category-in:before  { width:{{catLineWidth}}px; }'
                    ],
                ]
            ],
            'catLineSpacing' => [
                'type' => 'object',
                'default' => (object)['lg'=>'30'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'catStyle','condition'=>'!=','value'=>'classic'],
                        ],
                        'selector' => '{{ULTP}} .ultp-category-borderBoth .ultp-category-in { padding-left: {{catLineSpacing}}px; padding-right: {{catLineSpacing}}px; }
                        {{ULTP}} .ultp-category-borderLeft .ultp-category-in { padding-left: {{catLineSpacing}}px; }
                        {{ULTP}} .ultp-category-borderRight .ultp-category-in { padding-right:{{catLineSpacing}}px; }'
                    ],
                ]
            ],
            'catLineColor' => [
                'type' => 'string',
                'default' => '#037fff',
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'catStyle','condition'=>'!=','value'=>'classic'],
                        ],
                        'selector' => '{{ULTP}} .ultp-category-borderRight .ultp-category-in:before, {{ULTP}} .ultp-category-borderLeft .ultp-category-in:before, {{ULTP}} .ultp-category-borderBoth .ultp-category-in:after, {{ULTP}} .ultp-category-borderBoth .ultp-category-in:before { background:{{catLineColor}}; }'
                    ],
                ]
            ],
            'catLineHoverColor' => [
                'type' => 'string',
                'default' => '#037fff',
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'catStyle','condition'=>'!=','value'=>'classic'],
                        ],
                        'selector' => '{{ULTP}} .ultp-category-borderBoth:hover .ultp-category-in:before, {{ULTP}} .ultp-category-borderBoth:hover .ultp-category-in:after, {{ULTP}} .ultp-category-borderLeft:hover .ultp-category-in:before, {{ULTP}} .ultp-category-borderRight:hover .ultp-category-in:before { background:{{catLineHoverColor}}; }'
                    ],
                ]
            ],
            'catTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography' => 1, 'size' => (object)['lg' =>14, 'unit' =>'px'], 'height' => (object)['lg' =>20, 'unit' =>'px'], 'spacing' => (object)['lg' =>0, 'unit' =>'px'], 'transform' => '', 'weight' => '400', 'decoration' => 'none','family'=>'' ],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'catShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-items-wrap .ultp-block-item .ultp-category-grid a'
                    ],
                ],
            ],
            'catColor' => [
                'type' => 'string',
                'default' => '#037fff',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'catShow','condition'=>'==','value'=>true],
                            (object)['key'=>'customCatColor','condition'=>'!=','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-items-wrap .ultp-block-item .ultp-category-grid a { color:{{catColor}}; }'
                    ],
                ],
            ],
            'catBgColor' => [
                'type' => 'object',
                'default' => (object)['openColor' => 1,'type' => 'color', 'color' => ''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'catShow','condition'=>'==','value'=>true],
                            (object)['key'=>'customCatColor','condition'=>'!=','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-category-grid a'
                    ],
                ],
            ],
            'catBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'catShow','condition'=>'==','value'=>true],
                            (object)['key'=>'onlyCatColor','condition'=>'!=','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-category-grid a'
                    ],
                ],
            ],
            'catRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'0', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'catShow','condition'=>'==','value'=>true],
                            (object)['key'=>'onlyCatColor','condition'=>'!=','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-category-grid a { border-radius:{{catRadius}}; }'
                    ],
                ],
            ],
            'catHoverColor' => [
                'type' => 'string',
                'default' => '#828282',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'catShow','condition'=>'==','value'=>true],
                            (object)['key'=>'customCatColor','condition'=>'!=','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-items-wrap .ultp-category-grid a:hover { color:{{catHoverColor}}; }'
                    ],
                ],
            ],
            'catBgHoverColor' => [
                'type' => 'object',
                'default' => (object)['openColor' => 1, 'type' => 'color', 'color' => ''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'catShow','condition'=>'==','value'=>true],
                            (object)['key'=>'customCatColor','condition'=>'!=','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-category-grid a:hover'
                    ],
                ],
            ],
            'catHoverBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'catShow','condition'=>'==','value'=>true],
                            (object)['key'=>'onlyCatColor','condition'=>'!=','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-category-grid a:hover'
                    ],
                ],
            ],
            'catSacing' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => 10,'bottom' => 5,'left' => 0,'right' => 0, 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'catShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-category-grid { margin:{{catSacing}}; }'
                    ],
                ],
            ],
            'catPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => "0",'bottom' => "0",'left' => "0",'right' => "0", 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'catShow','condition'=>'==','value'=>true],
                            (object)['key'=>'onlyCatColor','condition'=>'!=','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-category-grid a { padding:{{catPadding}}; }'
                    ],
                ],
            ],
            
            /*============================
                Meta Setting/Style
            ============================*/
            'metaPosition' => [
                'type' => 'string',
                'default' => 'top',
            ],
            'metaStyle' => [
                'type' => 'string',
                'default' => 'icon',
            ],
            'authorLink' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'metaSeparator' => [
                'type' => 'string',
                'default' => 'dot',
            ],
            'metaList' => [
                'type' => 'string',
                'default' => '["metaAuthor","metaDate","metaRead"]',
            ],
            'metaMinText' => [
                'type' => 'string',
                'default' => 'min read',
            ],
            'metaAuthorPrefix' => [
                'type' => 'string',
                'default' => 'By',
            ],
            'metaDateFormat' => [
                'type' => 'string',
                'default' => 'M j, Y',
            ],
            'metaTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography' => 1,'size' => (object)['lg' =>12, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px'], 'transform' => '', 'decoration' => 'none','family'=>''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'metaShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-meta span, {{ULTP}} .ultp-block-item .ultp-block-meta span a'
                    ],
                ],
            ],
            'metaColor' => [
                'type' => 'string',
                'default' => '#989898',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'metaShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-items-wrap .ultp-block-meta span { color: {{metaColor}}; } {{ULTP}} .ultp-block-items-wrap .ultp-block-meta span svg { fill: {{metaColor}}; } {{ULTP}} .ultp-block-items-wrap .ultp-block-meta span a { color: {{metaColor}}; }{{ULTP}} .ultp-block-meta-dot span:after { background:{{metaColor}}; }  {{ULTP}} .ultp-block-meta span:after { color:{{metaColor}}; }'
                    ],
                ],
            ],
            'metaHoverColor' => [
                'type' => 'string',
                'default' => '#000',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'metaShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-items-wrap .ultp-block-meta span:hover , {{ULTP}} .ultp-block-items-wrap .ultp-block-meta span:hover a { color: {{metaHoverColor}}; } {{ULTP}} .ultp-block-items-wrap .ultp-block-meta span:hover svg { fill: {{metaHoverColor}}; }'
                    ],
                ],
            ],
            'metaSpacing' => [
                'type' => 'object',
                'default' => (object)['lg' =>'15', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'metaShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-meta span { margin-right:{{metaSpacing}}; } {{ULTP}} .ultp-block-meta span { padding-left: {{metaSpacing}}; } .rtl {{ULTP}} .ultp-block-meta span {margin-right:0; margin-left:{{metaSpacing}}; } .rtl {{ULTP}} .ultp-block-meta span { padding-left:0; padding-right: {{metaSpacing}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'metaShow','condition'=>'==','value'=>true],
                            (object)['key'=>'contentAlign','condition'=>'==','value'=>'right'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-items-wrap .ultp-block-meta span:last-child{margin-right:0px;}'
                    ],
                ],
            ],
            'metaMargin' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '5','bottom' => '', 'left'=>'','right'=>'', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'metaShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-meta { margin:{{metaMargin}}; }'
                    ],
                ],
            ],
            'metaPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '5','bottom' => '5', 'left'=>'','right'=>'', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'metaShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-meta { padding:{{metaPadding}}; }'
                    ],
                ],
            ],
            'metaBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => '0', 'bottom' => '0', 'left' => '0'],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'metaShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-meta'
                    ],
                ],
            ],
            'metaBg' => [
                'type' => 'string',
                'default' => '',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'metaShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-meta { background:{{metaBg}}; }'
                    ],
                ],
            ],


            /*============================
                Inner Content Setting/Style
            ============================*/
            'contentAlign' => [
                'type' => 'string',
                'default' => "center",
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'contentAlign','condition'=>'==','value'=>'left'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-content { text-align:{{contentAlign}}; } {{ULTP}} .ultp-block-meta {justify-content: flex-start;} {{ULTP}} .ultp-block-image img, {{ULTP}} .ultp-block-image { margin-right: auto; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'contentAlign','condition'=>'==','value'=>'center'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-content { text-align:{{contentAlign}}; } {{ULTP}} .ultp-block-meta {justify-content: center;} {{ULTP}} .ultp-block-image img, {{ULTP}} .ultp-block-image { margin: 0 auto; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'contentAlign','condition'=>'==','value'=>'right'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-content { text-align:{{contentAlign}}; } {{ULTP}} .ultp-block-meta {justify-content: flex-end;} .rtl {{ULTP}} .ultp-block-meta {justify-content: start;} {{ULTP}} .ultp-block-image img, {{ULTP}} .ultp-block-image { margin-left: auto; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'contentAlign','condition'=>'==','value'=>'right'],
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'  .rtl {{ULTP}} .ultp-block-items-wrap .ultp-block-item .ultp-block-readmore a {display:flex; flex-direction:row-reverse;justify-content: flex-end;}'
                    ],
                ],
            ],
            'contentWrapBg' => [
                'type' => 'string',
                'default' => '',
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-content-wrap { background:{{contentWrapBg}}; }'
                    ],
                ],
            ],
            'contentWrapHoverBg' => [
                'type' => 'string',
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-content-wrap:hover { background:{{contentWrapHoverBg}}; }'
                    ],
                ],
            ],
            'contentWrapBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-content-wrap'
                    ],
                ],
            ],
            'contentWrapHoverBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-content-wrap:hover'
                    ],
                ],
            ],
            'contentWrapRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-content-wrap { border-radius: {{contentWrapRadius}}; }'
                    ],
                ],
            ],
            'contentWrapHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-content-wrap:hover { border-radius: {{contentWrapHoverRadius}}; }'
                    ],
                ],
            ],
            'contentWrapShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-content-wrap'
                    ],
                ],
            ],
            'contentWrapHoverShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-content-wrap:hover'
                    ],
                ],
            ],
            'innerBgColor' => [
                'type' => 'string',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'layout','condition'=>'==','value'=>['layout3','layout4','layout5']],
                        ],
                        'selector'=>'{{ULTP}} .ultp-layout3 .ultp-block-content-wrap .ultp-block-content,{{ULTP}} .ultp-layout4 .ultp-block-content-wrap .ultp-block-content, {{ULTP}} .ultp-layout5 .ultp-block-content-wrap .ultp-block-content { background:{{innerBgColor}}; }'
                    ],
                ],
            ],
            'contentWrapInnerPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['unit' =>'px']],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-content, {{ULTP}}.wp-block-ultimate-post-post-grid-1 .ultp-layout2 .ultp-block-content, {{ULTP}}.wp-block-ultimate-post-post-grid-1 .ultp-layout3 .ultp-block-content { padding: {{contentWrapInnerPadding}}; }'
                    ],
                ],
            ],
            'contentWrapPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['unit' =>'px']],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-content-wrap { padding: {{contentWrapPadding}}; }'
                    ],
                ],
            ],

            /*============================
                Image Style
            ============================*/
            'imgCrop' => [
                'type' => 'string',
                'default' => (ultimate_post()->get_setting('disable_image_size') == 'yes' ? 'full' : 'ultp_layout_landscape'),
                'depends' => [(object)['key' => 'showImage','condition' => '==','value' => true]]
            ],
            'imgCropSmall' => [
                'type' => 'string',
                'default' => (ultimate_post()->get_setting('disable_image_size') == 'yes' ? 'full' : 'ultp_layout_square'),
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'showImage','condition' => '==','value' => true],
                            (object)['key' => 'gridStyle','condition' => '!=','value' => 'style1']
                        ],
                    ]
                ]
            ],
            'imgWidth' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'ulg' =>'%'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-item .ultp-block-image { max-width: {{imgWidth}}; } {{ULTP}} .ultp-block-item .ultp-block-image img { width: 100% }'
                    ],
                ],
            ],
            'imgHeight' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-item .ultp-block-image img {height: {{imgHeight}} !important; }'
                    ],
                ],
            ],
            'imageScale' => [
                'type' => 'string',
                'default' => 'cover',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true]
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-item .ultp-block-image img {object-fit: {{imageScale}};}'
                    ],
                ],
            ],
            'imgAnimation' => [
                'type' => 'string',
                'default' => 'opacity',
            ],
            'imgGrayScale' => [
                'type' => 'object',
                'default' => (object)['lg' =>'0', 'ulg' =>'%', 'unit' =>'%'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-image { filter: grayscale({{imgGrayScale}}); }'
                    ],
                ],
            ],
            'imgHoverGrayScale' => [
                'type' => 'object',
                'default' => (object)['lg' =>'0', 'unit' =>'%'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-item:hover .ultp-block-image { filter: grayscale({{imgHoverGrayScale}}); }'
                    ],
                ],
            ],
            'imgRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-image { border-radius:{{imgRadius}}; }'
                    ],
                ],
            ],
            'imgHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-item:hover .ultp-block-image { border-radius:{{imgHoverRadius}}; }'
                    ],
                ],
            ],
            'imgShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-image'
                    ],
                ],
            ],
            'imgHoverShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-item:hover .ultp-block-image'
                    ],
                ],
            ],
            'imgSpacing' => [
                'type' => 'object',
                'default' => (object)['lg'=>'10'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-item .ultp-block-image { margin-bottom: {{imgSpacing}}px; }'
                    ],
                ],
            ],
            'imgOverlay' => [
                'type' => 'boolean',
                'default' => false,
            ],
            'imgOverlayType' => [
                'type' => 'string',
                'default' => 'default',
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'imgOverlay','condition'=>'==','value'=>true],
                        ]
                    ],
                ]         
            ],
            'overlayColor' => [
                'type' => 'object',
                'default' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#0e1523'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'imgOverlayType','condition'=>'==','value'=>'custom'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-image-custom > a::before'
                    ],
                ],

            ],
            'imgOpacity' => [
                'type' => 'string',
                'default' => .7,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'imgOverlayType','condition'=>'==','value'=>'custom'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-image-custom > a::before { opacity: {{imgOpacity}}; }'
                    ],
                ],
            ],
            'fallbackEnable' => [
                'type' => 'boolean',
                'default' => true,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=> true],
                        ],
                    ],
                ],
            ],
            'fallbackImg' => [
                'type' => 'object',
                'default' => '',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=> true],
                            (object)['key'=>'fallbackEnable','condition'=>'==','value'=> true],
                        ],
                    ],
                ],
            ],
            'imgSrcset' => [
                'type' => 'boolean',
                'default' => false,
            ],
            'imgLazy' => [
                'type' => 'boolean',
                'default' => false,
            ],

            /*============================
                Video Style
            ============================*/
            'vidIconEnable' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'popupAutoPlay' => [
                'type' => 'boolean',
                'default' => true,
                'style' => [
                    (object) [
                        'depends' => [
                            (object)['key' => 'enablePopup','condition' => '==','value' => true],
                        ],
                    ]
                ],
            ],
            'vidIconPosition' => [
                'type' => 'string',
                'default' => 'center',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'vidIconEnable','condition' => '==','value' => true],
                            (object)['key' => 'vidIconPosition','condition' => '==','value' =>  'bottomRight']
                        ],
                        'selector'=>'{{ULTP}} .ultp-video-icon { bottom: 20px; right: 20px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'vidIconEnable','condition' => '==','value' => true],
                            (object)['key' => 'vidIconPosition','condition' => '==','value' =>  'center']
                        ],
                        'selector'=>'{{ULTP}} .ultp-video-icon {    
                            margin: 0 auto;
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%,-60%);
                            -o-transform: translate(-50%,-60%);
                            -ms-transform: translate(-50%,-60%);
                            -moz-transform: translate(-50%,-60%);
                            -webkit-transform: translate(-50%,-50%);
                            z-index: 998;}'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'vidIconEnable','condition' => '==','value' => true],
                            (object)['key' => 'vidIconPosition','condition' => '==','value' =>  'bottomLeft']
                        ],
                        'selector'=>'{{ULTP}} .ultp-video-icon { bottom: 20px; left: 20px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'vidIconEnable','condition' => '==','value' => true],
                            (object)['key' => 'vidIconPosition','condition' => '==','value' =>  'topRight']
                        ],
                        'selector'=>'{{ULTP}} .ultp-video-icon { top: 20px; right: 20px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'vidIconEnable','condition' => '==','value' => true],
                            (object)['key' => 'vidIconPosition','condition' => '==','value' =>  'topLeft']
                        ],
                        'selector'=>'{{ULTP}} .ultp-video-icon { top: 20px; left: 20px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'vidIconEnable','condition' => '==','value' => true],
                            (object)['key' => 'vidIconPosition','condition' => '==','value' =>  'rightMiddle']
                        ],
                        'selector'=>'{{ULTP}} .ultp-video-icon {display: flex; justify-content: flex-end; align-items: center; height: 100%; width: 100%; top:0px;}'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'vidIconEnable','condition' => '==','value' => true],
                            (object)['key' => 'vidIconPosition','condition' => '==','value' =>  'leftMiddle']
                        ],
                        'selector'=>'{{ULTP}} .ultp-video-icon {display: flex; justify-content: flex-start; align-items: center; height: 100%; width: 100%; top: 0px;}'
                    ]
                ],
            ],
            'popupIconColor' => [
                'type' => 'string',
                'default' =>  '#fff',
                'style' => [
                    (object) [
                        'depends' => [
                            (object)['key' => 'vidIconEnable','condition' => '==','value' => true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-video-icon svg { fill: {{popupIconColor}};  } {{ULTP}} .ultp-video-icon svg circle { stroke: {{popupIconColor}};  }'
                    ]
                ],
            ],
            'popupHovColor' => [
                'type' => 'string',
                'default' =>  '#d2d2d2',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'vidIconEnable','condition' => '==','value' => true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-video-icon svg:hover { fill: {{popupHovColor}}; } {{ULTP}} .ultp-video-icon svg:hover circle { stroke: {{popupHovColor}};}'
                    ]
                ],
            ],
            'iconSize' => [
                'type' => 'object',
                'default' => (object)['lg'=>'80', 'sm'=> '50', 'xs'=> '50', 'unit' => 'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'vidIconEnable','condition' => '==','value' => true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-video-icon svg { height:{{iconSize}}; width: {{iconSize}};}'
                    ],
                ],
            ],
            // by default should be off
            'enablePopup' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'vidIconEnable','condition' => '==','value' =>  true]
                        ],
                    ],
                ],
            ],
            'popupWidth' => [
                'type' => 'object',
                'default' => (object)['lg'=>'70'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'enablePopup','condition' => '==','value' =>  true]
                        ],
                        'selector'=>'{{ULTP}} .ultp-video-modal .ultp-video-modal__Wrapper {width:{{popupWidth}}% !important;}'
                    ],
                ],
            ],
            'enablePopupTitle' => [
                'type' => 'boolean',
                'default' => true,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'enablePopup','condition' => '==','value' =>  true],
                        ],
                    ]
                ],
            ],
            'popupTitleColor' => [
                'type' => 'string',
                'default' =>  '#fff',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'enablePopupTitle','condition' => '==','value' =>  true],
                            (object)['key' => 'enablePopup','condition' => '==','value' =>  true]
                        ],
                        'selector'=>'{{ULTP}} .ultp-video-modal__Wrapper a { color:{{popupTitleColor}} !important; }'
                    ]
                ],
            ],
            'closeIconSep' => [
                'type' => 'string',
                'default' =>  '#fff',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'enablePopup','condition' => '==','value' =>  true],
                        ],
                    ]
                ],
            ],
            'closeIconColor' => [
                'type' => 'string',
                'default' =>  '#fff',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'enablePopup','condition' => '==','value' =>  true],
                        ],
                        'selector'=>'{{ULTP}}  .ultp-video-close { color:{{closeIconColor}}; }'
                    ]
                ],
            ],
            'closeHovColor' => [
                'type' => 'string',
                'default' =>  '#8f8f8f',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'enablePopup','condition' => '==','value' =>  true],
                        ],
                        'selector'=>'{{ULTP}}  .ultp-video-close:hover { color:{{closeHovColor}}; }'
                    ]
                ],
            ],
            'closeSize' => [
                'type' => 'object',
                'default' => (object)['lg'=>'70', 'unit' => 'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'enablePopup','condition' => '==','value' =>  true],
                        ],
                        'selector'=>'{{ULTP}}  .ultp-video-close { font-size:{{closeSize}}; }'
                    ],
                ],
            ],


            /*============================
                Separator Style
            ============================*/            
            'separatorShow' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'septColor' => [
                'type' => 'string',
                'default' => '#e5e5e5',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'separatorShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-item { border-bottom-color:{{septColor}}; }'
                    ],
                ],
            ],
            'septStyle' => [
                'type' => 'string',
                'default' => 'dashed',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'separatorShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-item { border-bottom-style:{{septStyle}}; }'
                    ],
                ],
            ],
            'septSize' => [
                'type' => 'string',
                'default' => (object)['lg'=>'1'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'separatorShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-item { border-bottom-width: {{septSize}}px; }'
                    ],
                ],
            ],

            /*============================
                Read More Style
            ============================*/
            'readMoreText' => [
                'type' => 'string',
                'default' => ''
            ],
            'readMoreIcon' => [
                'type' => 'string',
                'default' => 'rightArrowLg',
            ],
            'readMoreTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography' => 1, 'size' => (object)['lg' =>12, 'unit' =>'px'], 'height' => (object)['lg' =>'', 'unit' =>'px'], 'spacing' => (object)['lg' =>1, 'unit' =>'px'], 'transform' => '', 'weight' => '400', 'decoration' => 'none','family'=>'' ],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-items-wrap .ultp-block-item .ultp-block-readmore a'
                    ],
                ],
            ],
            'readMoreIconSize' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector' => '{{ULTP}} .ultp-block-readmore svg{ width:{{readMoreIconSize}}; }'
                    ],
                ]
            ],
            'readMoreColor' => [
                'type' => 'string',
                'default' => '#0d1523',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-items-wrap .ultp-block-readmore a { color:{{readMoreColor}}; } {{ULTP}} .ultp-block-readmore a svg { fill:{{readMoreColor}}; }'
                    ],
                ],
            ],
            'readMoreBgColor' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0,'type' => 'color', 'color' => ''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-readmore a'
                    ],
                ],
            ],
            'readMoreBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-readmore a'
                    ],
                ],
            ],
            'readMoreRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-readmore a { border-radius:{{readMoreRadius}}; }'
                    ],
                ],
            ],
            'readMoreHoverColor' => [
                'type' => 'string',
                'default' => '#0c32d8',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-items-wrap .ultp-block-readmore a:hover { color:{{readMoreHoverColor}}; } {{ULTP}} .ultp-block-readmore a:hover svg { fill:{{readMoreHoverColor}}; }'
                    ],
                ],
            ],
            'readMoreBgHoverColor' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => ''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-readmore a:hover'
                    ],
                ],
            ],
            'readMoreHoverBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-readmore a:hover'
                    ],
                ],
            ],
            'readMoreHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-readmore a:hover { border-radius:{{readMoreHoverRadius}}; }'
                    ],
                ],
            ],
            'readMoreSacing' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => 15,'bottom' => '','left' => '','right' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-readmore { margin:{{readMoreSacing}}; }'
                    ],
                ],
            ],
            'readMorePadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '','right' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-readmore a { padding:{{readMorePadding}}; }'
                    ],
                ],
            ],
            
            /*============================
                Filter Setting/Style
            ============================*/
            'filterBelowTitle' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-filter .ultp-filter-navigation { position: relative; display: block; margin: auto 0 0 0; height: auto;}'
                    ],
                ],
            ],
            'filterAlign' => [
                'type' => 'object',
                'default' => (object)['lg' =>''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterBelowTitle','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-heading-filter .ultp-filter-navigation { text-align:{{filterAlign}}; }'
                    ],
                ],
            ],
            'filterType' => [
                'type' => 'string',
                'default' => 'category'
            ],
            'filterText' => [
                'type' => 'string',
                'default' => 'all'
            ],
            'filterValue' => [
                'type' => 'string',
                'default' => '[]',
                'style' => [
                    (object)[
                        'depends' => [(object)['key' => 'filterType','condition' => '!=','value' => '']]
                    ],
                ],
            ],
            'fliterTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography' => 1,'size' => (object)['lg' =>14, 'unit' =>'px'],'height' => (object)['lg' =>22, 'unit' =>'px'], 'decoration' => 'none','family'=>'','weight'=>500],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-navigation .ultp-filter-wrap ul li a'
                    ],
                ],
            ],
            'filterColor' => [
                'type' => 'string',
                'default' => '#0e1523',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-navigation .ultp-filter-wrap ul li a { color:{{filterColor}}; } {{ULTP}} .flexMenu-viewMore a:before { border-color:{{filterColor}}}'
                    ],
                ],
            ],
            'filterHoverColor' => [
                'type' => 'string',
                'default' =>  '#828282',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-wrap ul li a:hover, {{ULTP}} .ultp-filter-wrap ul li a.filter-active { color:{{filterHoverColor}}  !important; } {{ULTP}} .ultp-flex-menu .flexMenu-viewMore a:hover::before { border-color:{{filterHoverColor}}}'
                    ],
                ],
            ],
            'filterBgColor' => [
                'type' => 'string',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-wrap ul li.filter-item > a { background:{{filterBgColor}}; }'
                    ],
                ],
            ],
            'filterHoverBgColor' => [
                'type' => 'string',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-wrap ul li.filter-item > a:hover, {{ULTP}} .ultp-filter-wrap ul li.filter-item > a.filter-active, {{ULTP}} .ultp-filter-wrap ul li.flexMenu-viewMore > a:hover { background:{{filterHoverBgColor}}; }'
                    ],
                ],
            ],
            'filterBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-wrap ul li.filter-item > a'
                    ],
                ],
            ],
            'filterHoverBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-wrap ul li.filter-item > a:hover'
                    ],
                ],
            ],
            'filterRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-wrap ul li.filter-item > a { border-radius:{{filterRadius}}; }'
                    ],
                ],
            ],
            'fliterSpacing' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '', 'right' => '', 'left' => '20', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-wrap ul li { margin:{{fliterSpacing}}; }'
                    ],
                ],
            ],
            'fliterPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-wrap ul li.filter-item > a, {{ULTP}} .ultp-filter-wrap .flexMenu-viewMore > a { padding:{{fliterPadding}}; }'
                    ],
                ],
            ],
            'filterDropdownColor' => [
                'type' => 'string',
                'default' =>  '#0e1523',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-wrap ul li.flexMenu-viewMore .flexMenu-popup li a { color:{{filterDropdownColor}}; }'
                    ],
                ],
            ],
            'filterDropdownHoverColor' => [
                'type' => 'string',
                'default' =>  '#037fff',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-wrap ul li.flexMenu-viewMore .flexMenu-popup li a:hover { color:{{filterDropdownHoverColor}}; }'
                    ],
                ],
            ],
            'filterDropdownBg' => [
                'type' => 'string',
                'default' =>  '#fff',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-wrap ul li.flexMenu-viewMore .flexMenu-popup { background:{{filterDropdownBg}}; }'
                    ],
                ],
            ],
            'filterDropdownRadius' => [
                'type' => 'object',
                'default' => (object)['lg'=>'0'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-wrap ul li.flexMenu-viewMore .flexMenu-popup { border-radius:{{filterDropdownRadius}}; }'
                    ],
                ],
            ],
            'filterDropdownPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '15','bottom' => '15','left' => '20','right' => '20', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-filter-wrap ul li.flexMenu-viewMore .flexMenu-popup { padding:{{filterDropdownPadding}}; }'
                    ],
                ],
            ],
            'filterMobile' =>  [
                'type' => 'boolean',
                'default' => true,
            ],
            'filterMobileText' => [
                'type' => 'string',
                'default' => 'More',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'filterMobile','condition'=>'==','value'=>true],
                        ]
                    ]
                ]
            ],

            /*============================
                Pagination Setting/Style
            ============================*/
            'paginationType' => [
                'type' => 'string',
                'default' => 'pagination',
            ],
            'loadMoreText' => [
                'type' => 'string',
                'default' => 'Load More',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationType','condition'=>'==','value'=>'loadMore'],
                        ],
                    ],
                ],
            ],
            'paginationText' => [
                'type' => 'string',
                'default' => 'Previous|Next',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationType','condition'=>'==','value'=>'pagination']
                        ]
                    ]
                ]
            ],
            'paginationNav' => [
                'type' => 'string',
                'default' => 'textArrow',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationType','condition'=>'==','value'=>'pagination'],
                        ],
                    ],
                ],
            ],
            'paginationAjax' => [
                'type' => 'boolean',
                'default' => true,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationType','condition'=>'==','value'=>'pagination'],
                        ],
                    ],
                ],
             ],
            'navPosition' => [
                'type' => 'string',
                'default' => 'topRight',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationType','condition'=>'==','value'=>'navigation'],
                        ],
                    ],
                ],
            ],
            'pagiAlign' => [
                'type' => 'object',
                'default' =>  (object)['lg' =>'center'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-loadmore, {{ULTP}} .ultp-next-prev-wrap ul, {{ULTP}} .ultp-pagination { text-align:{{pagiAlign}}; }'
                    ],
                ],
            ],
            'pagiTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography' => 1,'size' => (object)['lg' =>14, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px'], 'decoration' => 'none','family'=>''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-pagination-wrap .ultp-pagination li a, {{ULTP}} .ultp-loadmore .ultp-loadmore-action'
                    ],
                ],

            ],
            'pagiArrowSize' => [
                'type' => 'object',
                'default' => (object)['lg'=>'14'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationType','condition'=>'==','value'=>'navigation'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-next-prev-wrap ul li a svg { width:{{pagiArrowSize}}px; }'
                    ],
                ],

            ],
            'pagiColor' => [
                'type' => 'string',
                'default' => '#fff',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-pagination-wrap .ultp-pagination li a, {{ULTP}} .ultp-next-prev-wrap ul li a, {{ULTP}} .ultp-block-wrapper .ultp-loadmore .ultp-loadmore-action { color:{{pagiColor}}; } {{ULTP}} .ultp-next-prev-wrap ul li a svg { fill:{{pagiColor}}; } {{ULTP}} .ultp-pagination li a svg, {{ULTP}} .ultp-block-wrapper .ultp-loadmore .ultp-loadmore-action svg { fill:{{pagiColor}}; }'
                    ],
                ],
            ],
            'pagiBgColor' => [
                'type' => 'object',
                'default' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#0e1523'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-pagination-wrap .ultp-pagination li a, {{ULTP}} .ultp-next-prev-wrap ul li a, {{ULTP}} .ultp-loadmore .ultp-loadmore-action'
                    ],
                ],
            ],
            'pagiBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-pagination li a, {{ULTP}} .ultp-next-prev-wrap ul li a, {{ULTP}} .ultp-loadmore-action'
                    ],
                ],
            ],
            'pagiShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-pagination li a, {{ULTP}} .ultp-next-prev-wrap ul li a, {{ULTP}} .ultp-loadmore-action'
                    ],
                ],
            ],
            'pagiRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '2','bottom' => '2','left' => '2','right' => '2', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-pagination li a, {{ULTP}} .ultp-next-prev-wrap ul li a, {{ULTP}} .ultp-loadmore-action { border-radius:{{pagiRadius}}; }'
                    ],
                ],
            ],
            'pagiHoverColor' => [
                'type' => 'string',
                'default' => '#fff',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-pagination-wrap .ultp-pagination li.pagination-active a, {{ULTP}} .ultp-next-prev-wrap ul li a:hover, {{ULTP}} .ultp-block-wrapper .ultp-loadmore-action:hover { color:{{pagiHoverColor}}; } {{ULTP}} .ultp-pagination li a:hover svg { fill:{{pagiHoverColor}}; } {{ULTP}} .ultp-next-prev-wrap ul li a:hover svg, {{ULTP}} .ultp-block-wrapper .ultp-loadmore .ultp-loadmore-action:hover svg { fill:{{pagiHoverColor}}; } @media (min-width: 768px) { {{ULTP}} .ultp-pagination-wrap .ultp-pagination li a:hover { color:{{pagiHoverColor}};}}'
                    ],
                ],
            ],
            'pagiHoverbg' => [
                'type' => 'object',
                'default' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#037fff','replace'=>1],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-pagination-wrap .ultp-pagination li a:hover, {{ULTP}} .ultp-pagination-wrap .ultp-pagination li.pagination-active a, {{ULTP}} .ultp-pagination-wrap .ultp-pagination li a:focus, {{ULTP}} .ultp-next-prev-wrap ul li a:hover, {{ULTP}} .ultp-loadmore-action:hover{ {{pagiHoverbg}} }'
                    ],
                ],
            ],
            'pagiHoverBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-pagination li a:hover, {{ULTP}} .ultp-pagination li.pagination-active a, {{ULTP}} .ultp-next-prev-wrap ul li a:hover, {{ULTP}} .ultp-loadmore-action:hover'
                    ],
                ],
            ],
            'pagiHoverShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-pagination li a:hover, {{ULTP}} .ultp-pagination li.pagination-active a, {{ULTP}} .ultp-next-prev-wrap ul li a:hover, {{ULTP}} .ultp-loadmore-action:hover'
                    ],
                ],
            ],
            'pagiHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '2','bottom' => '2','left' => '2','right' => '2', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-pagination li.pagination-active a, {{ULTP}} .ultp-pagination li a:hover, {{ULTP}} .ultp-next-prev-wrap ul li a:hover, {{ULTP}} .ultp-loadmore-action:hover { border-radius:{{pagiHoverRadius}}; }'
                    ],
                ],
            ],
            'pagiPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '8','bottom' => '8','left' => '14','right' => '14', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{ULTP}} .ultp-pagination li a, {{ULTP}} .ultp-next-prev-wrap ul li a, {{ULTP}} .ultp-loadmore-action { padding:{{pagiPadding}}; }'
                    ],
                ],
            ],
            'navMargin' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '0', 'right' => '0', 'bottom' => '0', 'left' => '0', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationType','condition'=>'==','value'=>'navigation'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-next-prev-wrap ul { margin:{{navMargin}}; }'
                    ],
                ],
            ],
            'pagiMargin' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '30', 'right' => '0', 'bottom' => '0', 'left' => '0', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'paginationType','condition'=>'!=','value'=>'navigation'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-pagination-wrap .ultp-pagination, {{ULTP}} .ultp-loadmore { margin:{{pagiMargin}}; }'
                    ],
                ],
            ],

            /*============================
                Wrapper Style
            ============================*/
            'loadingColor' => [
                'type' => 'string',
                'default' => '#000',
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-loading .ultp-loading-blocks div { --loading-block-color: {{loadingColor}}; }'
                    ],
                ],
            ],
            'wrapBg' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#f5f5f5'],
                'style' => [
                     (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper'
                    ],
                ],
            ],
            'wrapBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                     (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper'
                    ],
                ],
            ],
            'wrapShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                     (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper'
                    ],
                ],
            ],
            'wrapRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                     (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper { border-radius:{{wrapRadius}}; }'
                    ],
                ],
            ],
            'wrapHoverBackground' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#037fff'],
                'style' => [
                     (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper:hover'
                    ],
                ],
            ],
            'wrapHoverBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                     (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper:hover'
                    ],
                ],
            ],
            'wrapHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                     (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper:hover { border-radius:{{wrapHoverRadius}}; }'
                    ],
                ],
            ],
            'wrapHoverShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                     (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper:hover'
                    ],
                ],
            ],
            'wrapMargin' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
                'style' => [
                     (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper { margin:{{wrapMargin}}; }'
                    ],
                ],
            ],
            'wrapOuterPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
                'style' => [
                     (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper { padding:{{wrapOuterPadding}}; }'
                    ],
                ],
            ],
            'advanceId' => [
                'type' => 'string',
                'default' => '',
            ],
            'advanceZindex' => [
                'type' => 'string',
                'default' => '',
                'style' => [
                    (object)[
                        'selector' => '{{ULTP}} .ultp-block-wrapper{z-index:{{advanceZindex}};}'
                    ],
                ],
            ],
            'hideExtraLarge' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{ULTP}} {display:none;}'
                    ],
                ],
            ],
            'hideTablet' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{ULTP}} {display:none;}'
                    ],
                ],
            ],
            'hideMobile' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{ULTP}} {display:none;}'
                    ],
                ],
            ],
            'advanceCss' => [
                'type' => 'string',
                'default' => '',
                'style' => [(object)['selector' => '']],
            ]
        );
        
        if ($default) {
            $temp = array();
            foreach ($attributes as $key => $value) {
                if (isset($value['default'])) {
                    $temp[$key] = $value['default'];
                }
            }
            return $temp;
        } else {
            return $attributes;
        }
    }

    public function register() {
        register_block_type( 'ultimate-post/post-grid-1',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style'  => 'ultp-blocks-editor-css',
                'attributes' => $this->get_attributes(),
                'render_callback' =>  array($this, 'content')
            )
        );
    }

    public function content($attr, $noAjax) {
        global $unique_ID;
        if (!$noAjax) {
            $paged = is_front_page() ? get_query_var('page') : get_query_var('paged');
            $attr['paged'] = $paged ? $paged : 1;
        }
        if($attr['queryUnique'] && isset($attr['savedQueryUnique'])) {
            $unique_ID = $attr['savedQueryUnique'];
        }
        $block_name = 'post-grid-1';
        $page_post_id = ultimate_post()->get_ID();
        $wraper_before = $wraper_after = $post_loop = '';
        $attr['queryNumber'] = ultimate_post()->get_post_number(4, $attr['queryNumber'], $attr['queryNumPosts']);
        $recent_posts = new \WP_Query( ultimate_post()->get_query( $attr ) );
        $pageNum = ultimate_post()->get_page_number($attr, $recent_posts->found_posts);
        // Dummy Img Url
        $dummy_url = ULTP_URL.'assets/img/ultp-fallback-img.png';
        
        // Loadmore and Unique content 
        if($attr['queryUnique'] && isset($attr['loadMoreQueryUnique']) && $attr['paginationShow'] && ($attr['paginationType'] == 'loadMore')) {
            $unique_ID = $attr['loadMoreQueryUnique'];
            $current_unique_posts = $attr['ultp_current_unique_posts'];
        }

        if ($recent_posts->have_posts()) {
            $wraper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].''.(isset($attr["align"])? ' align' .$attr["align"]:'').''.(isset($attr["className"])?' '.$attr["className"]:'').'">';
                $wraper_before .= '<div class="ultp-block-wrapper">';

                    // Loading
                    $wraper_before .= ultimate_post()->loading();

                    if ($attr['headingShow'] || $attr['filterShow'] || $attr['paginationShow']) {
                        $wraper_before .= '<div class="ultp-heading-filter">';
                            $wraper_before .= '<div class="ultp-heading-filter-in">';
                                
                                // Heading
                                include ULTP_PATH.'blocks/template/heading.php';
                                
                                if ($attr['filterShow'] || $attr['paginationShow']) {
                                    $wraper_before .= '<div class="ultp-filter-navigation">';

                                        // Filter
                                        if($attr['filterShow'] && $attr['queryType'] != 'posts' && $attr['queryType'] != 'customPosts') {
                                            include ULTP_PATH.'blocks/template/filter.php';
                                        }

                                        // Navigation
                                        if ($attr['paginationShow'] && ($attr['paginationType'] == 'navigation') && ($attr['navPosition'] == 'topRight')) {
                                            include ULTP_PATH.'blocks/template/navigation-before.php';
                                        }
                                    $wraper_before .= '</div>';
                                }

                            $wraper_before .= '</div>';
                        $wraper_before .= '</div>';
                    }

                    $colClass = ($attr['gridStyle'] == 'style1' || $attr['gridStyle'] == 'style2') ? 'ultp-block-column-'.json_decode(json_encode($attr['columns']), True)['lg'] : '';

                    $wraper_before .= '<div class="ultp-block-items-wrap ultp-block-row ultp-pg1a-'.$attr['gridStyle'].' '.$colClass.' ultp-'.$attr['layout'].'">';
                    $idx = ($attr['paginationShow'] && ($attr['paginationType'] == 'loadMore')) ? ( $noAjax ? 1 : 0 ) : 0;
                        while ( $recent_posts->have_posts() ): $recent_posts->the_post();
                            
                            include ULTP_PATH.'blocks/template/data.php';

                            include ULTP_PATH.'blocks/template/category.php';

                            if ($attr['queryUnique']) {
                                $unique_ID[$attr['queryUnique']][] = $post_id;
                                $current_unique_posts[] = $post_id;
                            }
                            
                            if ($post_thumb_id && $attr['showImage']) {
                                $divStyle = 'background-image:url('.get_the_post_thumbnail_url($post_id, $attr['imgCrop']).')';
                            }
                            $post_loop .= '<'.$attr['contentTag'].' class="ultp-block-item post-id-'.$post_id.'">';
                                $post_loop .= '<div class="ultp-block-content-wrap">';
                                    if(($post_thumb_id || $attr['fallbackEnable']) && $attr['showImage'] && $attr['layout'] != 'layout2') {
                                        $post_loop .= '<div class="ultp-block-image ultp-block-image-'.$attr['imgAnimation'].($attr["imgOverlay"] ? ' ultp-block-image-overlay ultp-block-image-'.$attr["imgOverlayType"].' ultp-block-image-'.$attr["imgOverlayType"].$idx : '' ).'">';
                                            $post_loop .= '<a href="'.$titlelink.'" '.($attr['openInTab'] ? 'target="_blank"' : '').'>';
                                                $imgSize = (($attr['gridStyle'] == 'style1') ||
                                                    ($attr['gridStyle'] == 'style2' && $idx == 0) ||
                                                    ($attr['gridStyle'] == 'style3' && $idx%3 == 0) ||
                                                    ($attr['gridStyle'] == 'style4' && ($idx == 0 || $idx == 1))) ? $attr['imgCrop'] : $attr['imgCropSmall'];
                                                    // Post Img Id
                                                    $block_img_id = $post_thumb_id ? $post_thumb_id : ($attr['fallbackEnable'] && isset($attr['fallbackImg']['id']) ? $attr['fallbackImg']['id'] : '');
                                                    // Post Image
                                                    if($post_thumb_id || ($attr['fallbackEnable'] && $block_img_id)) {
                                                        $post_loop .=  ultimate_post()->get_image($block_img_id , $imgSize, '', $title, $attr['imgSrcset'], $attr['imgLazy']);
                                                    } else {
                                                        $post_loop .= '<img  src="'.$dummy_url.'" alt="dummy-img" />';
                                                    }
                                                $post_loop .= '</a>';
                                                if($post_video){
                                                    $post_loop .= '<div enableAutoPlay="'.$attr['popupAutoPlay'].'" class="ultp-video-icon">'.ultimate_post()->svg_icon('play_line').'</div>';
                                                }
                                            if (($attr['catPosition'] != 'aboveTitle') && $attr['catShow'] ) {
                                                $post_loop .= '<div class="ultp-category-img-grid">'.$category.'</div>';
                                            }
                                        $post_loop .= '</div>';
                                    }
                                    if ($attr['layout'] === 'layout2' ) { $post_loop .= '<div class="ultp-block-content-image" style='.$divStyle.'></div>';}
                                    $post_loop .= '<div class="ultp-block-content">';
                                        
                                        // Category
                                        if (($attr['catPosition'] == 'aboveTitle') && $attr['catShow']) {
                                            $post_loop .= $category;
                                        }

                                        // Title
                                        if ($title && $attr['titleShow'] && $attr['titlePosition'] == 1) {
                                            include ULTP_PATH.'blocks/template/title.php';
                                        }
                                        
                                        // Meta
                                        if ($attr['metaPosition'] =='top' ) {
                                            include ULTP_PATH.'blocks/template/meta.php';
                                        }
                                        
                                        // Title
                                        if ($title && $attr['titleShow'] && $attr['titlePosition'] == 0) {
                                            include ULTP_PATH.'blocks/template/title.php';
                                        }

                                        // Excerpt
                                        if ($attr['excerptShow']) {
                                            $post_loop .= '<div class="ultp-block-excerpt">'.ultimate_post()->get_excerpt($post_id, $attr['showSeoMeta'], $attr['showFullExcerpt'], $attr['excerptLimit']).'</div>';
                                        }

                                        // Read More
                                        if ( $attr['readMore'] ) {
                                            $post_loop .= '<div class="ultp-block-readmore"><a aria-label="'.$title.'" href="'.$titlelink.'" '.($attr['openInTab'] ? 'target="_blank"' : '').'>'.($attr['readMoreText'] ? $attr['readMoreText'] : esc_html__( "Read More", "ultimate-post" )).ultimate_post()->svg_icon($attr['readMoreIcon']).'</a></div>';
                                        }

                                        // Meta
                                        if ($attr['metaPosition'] =='bottom' ) {
                                            include ULTP_PATH.'blocks/template/meta.php';
                                        }

                                    $post_loop .= '</div>';
                                $post_loop .= '</div>';
                                if($post_video && $attr['enablePopup'] && $attr['layout'] !== 'layout2') {
                                    include ULTP_PATH.'blocks/template/video_popup.php';
                                }
                            $post_loop .= '</'.$attr['contentTag'].'>';
                            $idx ++;
                        endwhile;
                        if($attr['queryUnique']) {
                            $post_loop .= "<span style='display: none;' class='ultp-current-unique-posts' data-ultp-unique-ids= ".json_encode($unique_ID)." data-current-unique-posts= ".json_encode($current_unique_posts)."> </span>";
                        }
                        if ($attr['paginationShow'] && ($attr['paginationType'] == 'loadMore')) {
                            $wraper_after .= '<span class="ultp-loadmore-insert-before"></span>';
                        }
                    $wraper_after .= '</div>';//ultp-block-items-wrap
                    
                    // Load More
                    if ($attr['paginationShow'] && ($attr['paginationType'] == 'loadMore')) {
                        include ULTP_PATH.'blocks/template/loadmore.php';
                    }

                    // Navigation
                    if ($attr['paginationShow'] && ($attr['paginationType'] == 'navigation') && ($attr['navPosition'] != 'topRight')) {
                        include ULTP_PATH.'blocks/template/navigation-after.php';
                    }

                    // Pagination
                    if ($attr['paginationShow'] && ($attr['paginationType'] == 'pagination')) {
                        include ULTP_PATH.'blocks/template/pagination.php';
                    }

                $wraper_after .= '</div>';
            $wraper_after .= '</div>';
            
            wp_reset_query();
            
        }else {
            $wraper_before .= ultimate_post()->get_no_result_found_html( $attr['notFoundMessage'] );
        }

        return $noAjax ? $post_loop : $wraper_before.$post_loop.$wraper_after;
    }

}