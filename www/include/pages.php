<?php
// seznam stránek (href => title)
$pages = [
    '/' => 'Home',
    '/login.php' => 'Login',
    '/posts.php' => 'Posts',
];

// přihlášený uživatel smí nahrávat recepty
if (isLoggedIn())
    $pages['/upload.php'] = 'Upload';

if (isLoggedIn())
    $pages['/myposts.php'] = 'My posts';