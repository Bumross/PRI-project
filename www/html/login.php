<?php
// přihlášení uživatele
require '../prolog.php';
require INC . '/db.php';
require INC . '/html-begin.php';

// Proměnná pro uložení zprávy o chybě
$error_message = "";

switch (@$_POST['akce']) {
    case 'login':
        $jmeno = @$_POST['name'];
        $heslo = @$_POST['password'];
        if (authUser($name, $password)) {
            setName($password);
        } else {
            alert("Wrong name or password. Please try again.");
        }
        break;

    case 'logout':
        setName();
        break;
}

// nav až po nastavení jména, aby se zobrazilo
require INC . '/nav.php';

$inputClass = "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline";
?>

<script>
    function onSubmit(e) {
        // no default submit
        e.preventDefault()

        <?php if (!isLoggedIn()) { ?>
            // inputs
            let { name, password } = this.elements

            // trim and check
            if ((jmeno.value = jmeno.value.trim()).length < 3) {
                alert('Name is too short')
                return
            }

            // trim and check
            if ('heslo' == (heslo.value = heslo.value.trim())) {
                alert('Heslo nesmí být "heslo"')
                return
            }
        <?php } ?>

        // continue to submit
        this.submit()
    }
</script>

<div class="flex justify-center m-12">
    <form name="loginForm" class="bg-zinc-50 rounded px-8 pt-6 pb-8 mb-4" method="POST">
        <input type="hidden" name="akce" value="<?= isUser() ? 'logout' : 'login' ?>">
        <?php if (!isUser()) { ?>
            <div class="mb-4">
                Přihlášení
            </div>
            <div class="mb-4">
                <input class="<?= $inputClass ?>" name="jmeno" type="text" placeholder="jméno" required>
            </div>
            <div class="mb-4">
                <input class="<?= $inputClass ?>" name="heslo" type="password" placeholder="heslo" required>
            </div>
            <input class="bg-blue-500 text-white font-bold rounded py-2 px-4" type="submit"
                value="<?= isUser() ? 'Odhlásit' : 'Přihlásit' ?>" />
        <?php } else { ?>
            <div class="mb-4">
                <a href="logout.php" class="bg-blue-500 text-white font-bold rounded py-2 px-4">Odhlásit</a>
            </div>
        <?php } ?>
    </form>
</div>

<?php if (!isUser()) { ?>
<div class="flex justify-center m-12">
    <a href="register.php" class="text-blue-500 font-bold">Nemáš účet? Zaregistruj se.</a>
</div>
<?php } ?>


<script>
    document.loginForm.addEventListener('submit', onSubmit)
</script>

<?php require INC . '/html-end.php'; ?>
