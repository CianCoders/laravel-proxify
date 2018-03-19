<?php

/**
 * @package   shokmaster/laravel-proxify
 * @author    Michele Andreoli <michi.andreoli[at]gmail.com>
 * @copyright Copyright (c) Michele Andreoli
 * @author    Rik Schreurs <rik.schreurs[at]mail.com>
 * @copyright Copyright (c) Rik Schreurs
 * @author    Siddhant Baviskar <siddhantfriends[at]yahoo.co.in>
 * @copyright Copyright (c) Siddhant Baviskar
 * @author    Siddhant Baviskar <shokmaster[at]gmail.com>
 * @copyright Copyright (c) Juan Antonio Gómez Benito
 * @license   http://mit-license.org/
 * @link      https://github.com/shokmaster/laravel-proxify
 */

namespace Shokmaster\LaravelProxify\Exceptions;

/**
 * Exception class
 */
class ProxyMissingParamException extends ProxyException {

    public function __construct($parameter) {
        $this->httpStatusCode = 400;
        $this->errorType = 'proxy_missing_param';
        parent::__construct(\Lang::get('api-proxy-laravel::messages.proxy_missing_param', array('param' => $parameter)));
    }

}
