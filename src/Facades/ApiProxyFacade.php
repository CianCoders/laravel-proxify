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

namespace CianCoders\LaravelProxify\Facades;

use Illuminate\Support\Facades\Facade;

class ApiProxyFacade extends Facade {

    /**
     * Get the registered name of the component
     * @return string
     * @codeCoverageIgnore
     */
    protected static function getFacadeAccessor() {
        return 'api-proxy.proxy';
    }

}
