<?php

namespace application\helper;

class Cookie {

    public function set($name, $value, $expiry = 3600, $path = '/') {
        setcookie($name, $value, time() + $expiry, $path);
    }

    public function get($name) {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
    }

    public function delete($name, $path = '/') {
        if (isset($_COOKIE[$name])) {
            setcookie($name, '', time() - 3600, $path);
            unset($_COOKIE[$name]);
        }
    }
}