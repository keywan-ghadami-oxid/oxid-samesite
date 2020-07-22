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

namespace StainlessPlugins\Samesite\Core;

use OxidEsales\Eshop\Core\Registry;
use Symfony\Component\HttpFoundation\Cookie;

class UtilsServer extends UtilsServer_parent
{
    /**
     * sets cookie
     *
     * @param string $sName       cookie name
     * @param string $sValue      value
     * @param int    $iExpire     expire time
     * @param string $sPath       The path on the server in which the cookie will be available on
     * @param string $sDomain     The domain that the cookie is available.
     * @param bool   $blToSession is true, records cookie information to session
     * @param bool   $blSecure    if true, transfer cookie only via SSL
     * @param bool   $blHttpOnly  if true, only accessible via HTTP
     *
     * @return bool
     */
    public function setOxCookie(
        $sName,
        $sValue = "",
        $iExpire = 0,
        $sPath = '/',
        $sDomain = null,
        $blToSession = true,
        $blSecure = false,
        $blHttpOnly = true)
    {
        // Adopted from core -->
        if ($blToSession && !$this->isAdmin()) {
            $this->_saveSessionCookie($sName, $sValue, $iExpire, $sPath, $sDomain);
        }

        if (defined('OXID_PHP_UNIT') || php_sapi_name() === 'cli') {
            // do NOT set cookies in php unit or in cli because it would issue warnings
            return;
        }
        $config = $this->getConfig();
        //if shop runs in https only mode we can set secure flag to all cookies
        $blSecure = $blSecure || ($config->isSsl() && $config->getSslShopUrl() == $config->getShopUrl());
        // <-- END adopted from core

        // Call parent if mode is "off"
        $config = Registry::getConfig();
        if (!$config->getConfigParam('spsamesite_on'))
        {
            parent::setOxCookie($sName, $sValue, $iExpire, $sPath, $sDomain, $blToSession, $blSecure, $blHttpOnly);
        }

        $samesite = Cookie::SAMESITE_STRICT; // Fallback strict
        $configParam = $config->getConfigParam('spsamesite_fallback_mode');

        // Unknown cookies
        if ($configParam == 'none')
        {
            $samesite = Cookie::SAMESITE_NONE;
        }
        elseif ($configParam == 'lax')
        {
            $samesite = Cookie::SAMESITE_LAX;
        }

        // For cookies that are configured
        if (in_array($sName, $config->getConfigParam('spsamesite_none')))
        {
            $samesite = Cookie::SAMESITE_NONE;
        }
        elseif (in_array($sName, $config->getConfigParam('spsamesite_lax')))
        {
            $samesite = Cookie::SAMESITE_LAX;
        }
        elseif (in_array($sName, $config->getConfigParam('spsamesite_strict')))
        {
            $samesite = Cookie::SAMESITE_STRICT;
        }

        $myCookie = new Cookie(
            $sName,
            $sValue,
            $iExpire,
            $this->_getCookiePath($sPath),
            $this->_getCookieDomain($sDomain),
            $blSecure,
            $blHttpOnly,
            false,
            $samesite
        );

        header(
            "Set-Cookie: $myCookie",
            false
        );
    }
}
