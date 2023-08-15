<?php

if(!function_exists('generateUsername')) {
    function generateUsername(string $name): string
    {
        $username = explode(' ', $name);
        $username = substr($username[0], 0, 1) . substr($username[1], 0, 1);
        $username = strtoupper($username);
        $username = $username . uniqid(rand());
        $username = substr($username, 0, 6);

        return $username;

    }
}

/**
 * generate random code using uniqid passing,
 * the amount of character to be returned in the string.
 */
if (! function_exists('generateRandomCode')) {
    function generateRandomCode(int $amount = 0): string
    {
        $code = md5(uniqid(rand(), true));
        $code = substr($code, -$amount);
        $code = strtoupper($code);

        return $code;
    }
}
