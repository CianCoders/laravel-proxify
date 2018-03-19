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

namespace Shokmaster\LaravelProxify\Models;

class ProxyResponse {

    private $statusCode = null;
    private $reasonPhrase = null;
    private $protocolVersion = null;
    private $content = null;

    public function __construct($statusCode, $reasonPhrase, $protoVersion, $content) {
        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
        $this->protocolVersion = $protoVersion;
        $this->content = $content;
    }

    public function setStatusCode($status) {
        $this->statusCode = $status;
    }

    public function setReasonPhrase($phrase) {
        $this->reasonPhrase = $phrase;
    }

    public function setProtoVersion($proto) {
        $this->protocolVersion = $proto;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function getReasonPhrase() {
        return $this->reasonPhrase;
    }

    public function getProtoVersion() {
        return $this->protocolVersion;
    }

    public function getContent() {
        return $this->content;
    }
}
