<?php

namespace App\Helpers;

class CsrfTokenGenerator
{
    public static function generateToken(): void
    {
        // Generate Token
        $token = md5(uniqid());
        // $ttlToken = 3600;
        // $timeLimit = time() + $ttlToken;
        // if (array_key_exists('token', $_SESSION) &&
        //     $_SESSION['token_ttl'] > $timeLimit
        // )
        if (!array_key_exists('token', $_SESSION)) {
            $_SESSION['token'] = $token;
        }
    }
}