<?php
// přihlášení uživatele
require '../prolog.php';
require INC . '/db.php';
require INC . '/html-begin.php';

// Pokud byla odeslána registrace
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['akce']) && $_POST['akce'] === 'register') {
    $jmeno = $_POST['jmeno'];
    $heslo = $_POST['heslo'];
    $heslo_znovu = $_POST['heslo_znovu'];

    // Kontrola, zda hesla jsou stejná
    if ($heslo !== $heslo_znovu) {
        echo '<script>alert("Hesla se neshodují.");</script>';
    } else {
        // Registrovat uživatele
        registerUser($jmeno, $heslo);
        echo '<script>alert("Registrace proběhla úspěšně."); window.location.href = "login.php";</script>';
        exit; // Zastavení provádění skriptu po přesměrování
    }
}

// HTML formulář pro registraci
?>
<div class="flex justify-center m-12">
    <form name="registerForm" class="bg-zinc-50 rounded px-8 pt-6 pb-8 mb-4" method="POST">
        <input type="hidden" name="akce" value="register">
        <div class="mb-4">
            Registrace
        </div>
        <div class="mb-4">
            <input class="<?= $inputClass ?>" name="jmeno" type="text" placeholder="Jméno" required>
        </div>
        <div class="mb-4">
            <input class="<?= $inputClass ?>" name="heslo" type="password" placeholder="Heslo" required>
        </div>
        <div class="mb-4">
            <input class="<?= $inputClass ?>" name="heslo_znovu" type="password" placeholder="Heslo znovu" required>
        </div>
        <input class="bg-blue-500 text-white font-bold rounded py-2 px-4" type="submit" value="Registrovat" />
    </form>
</div>
<?php require INC . '/html-end.php'; ?>
