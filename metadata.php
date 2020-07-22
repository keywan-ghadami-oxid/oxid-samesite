<?php
/**
 * This Software is the property of OXID eSales and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * @author        OXID Professional Services
 * @link          https://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 *
 * @package actesting
 * Created: 2020-07-22, ja
 */

$sMetadataVersion = '2.1';

/**
 * Module information.
 */
$aModule = [
    'id' => 'stainless/samesite',
    'title' => [
        'de' => '[Stainless Plugins] Samesite-Flag für Cookies',
        'en' => '[Stainless Plugins] Same Site flag for cookies',
    ],
    'description' => [
        'de' => '',
        'en' => '',
    ],
    'version' => '1.0.0',
    'author' => 'OXID Professional Services',
    'url' => 'https://www.oxid-esales.com',
    'email' => 'ps@oxid-esales.com',
    'extend' => [
        \OxidEsales\Eshop\Core\UtilsServer::class => \StainlessPlugins\Samesite\Core\UtilsServer::class,
    ],
    'settings' => [

        // Mode picker
        [
            'group' => 'sp_basics',
            'name'  => 'spsamesite_on',
            'value' => true,
            'type'  => 'bool'
        ],
        [
            'group' => 'sp_basics',
            'name'  => 'spsamesite_fallback_mode',
            'constraints'   =>  'strict|lax|none',
            'value' => 'lax',
            'type'  => 'select'
        ],

        // Cookie groups
        [
            'group' => 'sp_cookie_groups',
            'name'  => 'spsamesite_strict',
            'value' => [
                'csrf_token', //to be definded
                'admin_sid',
            ],
            'type'  => 'arr'
        ],
        [
            'group' => 'sp_cookie_groups',
            'name'  => 'spsamesite_lax',
            'value' => [
                'sid',
                'sid_key',
                'language',
                'oxidadminhistory',
                'oxidadminprofile',
                'oxidadminlanguage',
            ],
            'type'  => 'arr'
        ],
        [
            'group' => 'sp_cookie_groups',
            'name'  => 'spsamesite_none',
            'value' => [],
            'type'  => 'arr'
        ],
    ],
];
