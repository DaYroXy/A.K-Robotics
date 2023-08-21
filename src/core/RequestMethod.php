<?php

class RequestMethod {
    public function get($key = null, $default = null) {
        if ($key === null) {
            return $_GET;
        }
        return $_GET[$key] ?? $default;
    }

    public function post($key = null, $default = null) {
        if ($key === null) {
            return $_POST;
        }
        return $_POST[$key] ?? $default;
    }

    public function server($key = null, $default = null) {
        if ($key === null) {
            return $_SERVER;
        }
        return $_SERVER[$key] ?? $default;
    }

    public function headers($key = null, $default = null) {
        $headers = getallheaders(); // This is a function provided by PHP to retrieve all request headers
        if ($key === null) {
            return $headers;
        }
        return $headers[$key] ?? $default;
    }
}
