<?php

/*
*
*
*/

class Response {
    private $body = [];
    private $headers = [];
    private $cookies = [];
    private $statusCode = 200;

    // HEADERS
    public function setHeaders($headers = []) {
        $this->headers = $headers;
    }

    public function setHeader($header, $value) {
        $this->headers[$header] = $value;
    }

    // Status Code
    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
    }

    // Cookies
    public function setCookies($cookies) {
        $this->cookeis = $cookies;
    }
    
    public function setCookie($name, $value, $expires = 0, $path = "/", $domain = "", $secure = false, $httpOnly = false) {
        $this->cookies[] = [
            'name' => $name,
            'value' => $value,
            'expires' => $expires,
            'path' => $path,
            'domain' => $domain,
            'secure' => $secure,
            'httpOnly' => $httpOnly
        ];
    }


}
