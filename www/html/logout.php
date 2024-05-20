<?php
// přihlášení uživatele
require '../prolog.php';
require INC . '/db.php';

// Odhlášení uživatele
setName(null);

// Přesměrování na index.php
header("Location: /index.php");
exit();
