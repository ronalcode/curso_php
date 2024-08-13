<?php

namespace Core\Middleware;

// use Core\Response;

class Auth
{
    function handle()
    {
        if (!($_SESSION['user'] ?? false)) {
            header('location: /');
            die();
        }
    }
}
