<?php
// seznam stránek (href => title)
$pages = [
    '/' => 'Home',
    '/posts.php' => 'Posts',
];

// přihlášený uživatel smí nahrávat recepty
if (!isLoggedIn())
    $pages['/login.php'] = 'Login';

if (isLoggedIn())
    $pages['/logout.php'] = 'Logout';

if (isLoggedIn())
    $pages['/upload.php'] = 'Upload';
