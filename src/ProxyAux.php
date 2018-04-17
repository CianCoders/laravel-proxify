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

namespace Shokmaster\LaravelProxify;

class ProxyAux {

    const GRANT_TYPE = 'grant_type';
    const ACCESS_TOKEN = 'access_token';
    const TOKEN_TYPE = 'token_type';
    const TOKEN_EXPIRES = 'expires_in';
    const REFRESH_TOKEN = 'refresh_token';
    const CLIENT_ID = 'client_id';
    const CLIENT_SECRET = 'client_secret';
    const COOKIE_URI = 'uri';
    const COOKIE_METHOD = 'method';
    const PASSWORD_GRANT = 'password';
    const HEADER_AUTH = "Authorization";
    const MODE_SKIP = '0';
    const MODE_LOGIN = '1';
    const MODE_TOKEN = '2';
    const MODE_REFRESH = '3';

    /**
     * @param $array
     * @param $key
     * @param $value
     * @return array
     */
    public static function addQueryValue($array, $key, $value) {
        if (array_key_exists($key, $array)) {
            unset($array[$key]);
        }
        return array_add($array, $key, $value);
    }

    /**
     * @param $array
     * @param $key
     * @return null
     */
    public static function getQueryValue($array, $key) {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }
        return null;
    }

    /**
     * @param $array
     * @param $key
     * @return array
     */
    public static function removeQueryValue($array, $key) {
        if (array_key_exists($key, $array)) {
            unset($array[$key]);
        }
        return $array;
    }
}
