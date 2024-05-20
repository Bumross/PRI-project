<?php
// prolog

// adressates
define('INC', __DIR__ . '/include');        // include files
define('XML', __DIR__ . '/xml');            // XML files
define('POSTS', '/var/database/posts');    // uploaded data

// configuration
define('TITLE', 'TOP-SHELF');

// transform xmls
define('TRANSFORM_SERVER_SIDE', true);

session_start();


function getName($prefix = ''): string
{
    $name = @$_SESSION['name'];
    return $name ? "$prefix$name" : '';
}


function setName($name = '')
{
    if ($name)
        $_SESSION['name'] = $name;
    else
        unset($_SESSION['name']);
}


function isLoggedIn(): bool
{
    return !!getName();
}