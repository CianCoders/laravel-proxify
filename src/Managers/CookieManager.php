<?php

/**
 * @package   CianCoders/laravel-proxify
 * @author    Michele Andreoli <michi.andreoli[at]gmail.com>
 * @copyright Copyright (c) Michele Andreoli
 * @author    Rik Schreurs <rik.schreurs[at]mail.com>
 * @copyright Copyright (c) Rik Schreurs
 * @author    Siddhant Baviskar <siddhantfriends[at]yahoo.co.in>
 * @copyright Copyright (c) Siddhant Baviskar
 * @author    Siddhant Baviskar <shokmaster[at]gmail.com>
 * @copyright Copyright (c) Juan Antonio Gómez Benito
 * @author    Luis José Ruano Pérez <rp.luisjose[at]gmail.com>
 * @copyright Copyright (c) Luis Ruano
 * @license   http://mit-license.org/
 * @link      https://github.com/CianCoders/laravel-proxify
 */

namespace CianCoders\LaravelProxify\Managers;

use Illuminate\Support\Facades\Cookie;
use CianCoders\LaravelProxify\Exceptions\CookieExpiredException;
use CianCoders\LaravelProxify\Exceptions\CookieInvalidException;
use CianCoders\LaravelProxify\ProxyAux;

class CookieManager
{

    const COOKIE_NAME = 'name';
    const COOKIE_TIME = 'time';
    private $info = null;

    public function __construct($info)
    {
        $this->info = $info;
    }

    /**
     * @param $callMode
     * @return mixed|string
     * @throws CookieExpiredException
     * @throws CookieInvalidException
     */
    public function tryParseCookie($callMode)
    {
        $parsedCookie = Cookie::get($this->info[CookieManager::COOKIE_NAME]);

        if (isset($parsedCookie)) {
            $parsedCookie = json_decode($parsedCookie, true);
            $this->validateCookie($parsedCookie);
        } else {
            if ($callMode !== ProxyAux::MODE_LOGIN) {
                throw new CookieExpiredException();
            }
        }

        return $parsedCookie;
    }

    /**
     * @param array $content
     * @return mixed
     */
    public function createCookie(Array $content)
    {
        if (!isset($this->info[CookieManager::COOKIE_TIME]) || $this->info[CookieManager::COOKIE_TIME] == null) {
            $cookie = Cookie::forever($this->info[CookieManager::COOKIE_NAME], json_encode($content));
        } else {
            $cookie = Cookie::make($this->info[CookieManager::COOKIE_NAME], json_encode($content), $this->info[CookieManager::COOKIE_TIME]);
        }
        return $cookie;
    }

    /**
     * @return mixed
     */
    public function destroyCookie()
    {
        return Cookie::forget($this->info[CookieManager::COOKIE_NAME]);
    }

    /**
     * @param $parsedCookie
     * @return bool
     * @throws CookieInvalidException
     */
    public function validateCookie($parsedCookie)
    {
        if (!isset($parsedCookie) || !array_key_exists(ProxyAux::ACCESS_TOKEN, $parsedCookie)) {
            throw new CookieInvalidException(ProxyAux::ACCESS_TOKEN);
        }
        if (!array_key_exists(ProxyAux::TOKEN_TYPE, $parsedCookie)) {
            throw new CookieInvalidException(ProxyAux::TOKEN_TYPE);
        }
        if (!array_key_exists(ProxyAux::TOKEN_EXPIRES, $parsedCookie)) {
            throw new CookieInvalidException(ProxyAux::TOKEN_EXPIRES);
        }
        if (!array_key_exists(ProxyAux::COOKIE_URI, $parsedCookie)) {
            throw new CookieInvalidException(ProxyAux::COOKIE_URI);
        }
        if (!array_key_exists(ProxyAux::CLIENT_ID, $parsedCookie)) {
            throw new CookieInvalidException(ProxyAux::CLIENT_ID);
        }

        return true;
    }

}
