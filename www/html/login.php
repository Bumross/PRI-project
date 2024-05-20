<?php
ob_start(); // Start output buffering

require '../prolog.php';
require INC . '/db.php';
require INC . '/html-begin.php';
require INC . '/boxes.php'; // Include the boxes.php file where successBox and errorBox functions are defined

$error_message = "";

switch (@$_POST['akce']) {
    case 'login':
        $name = @$_POST['name'];
        $password = @$_POST['password'];
        if (authUser($name, $password)) {
            setName($name);
            successBox("Successfully logged in."); // Display success message
            header("Location: /"); // Redirect to home page
            exit(); // Stop further execution
        } else {
            $error_message = "Wrong name or password. Please try again.";
        }
        break;

    case 'logout':
        setName(); // Not sure what setName() does exactly, but assuming it logs the user out
        break;
}

require INC . '/nav.php';

ob_end_flush(); // Flush output buffers

?>

<link rel="stylesheet" type="text/css" href="../../../styles/styles.css">

<div class="login-container">
    <form name="loginForm" method="POST" onsubmit="onSubmit(event)" class="login-form">
        <input type="hidden" name="akce" value="<?= isLoggedIn() ? 'logout' : 'login' ?>">
        <div class="input-field">
            <input name="name" type="text" placeholder="Username" required>
        </div>
        <div class="input-field">
            <input name="password" type="password" placeholder="Password" required>
        </div>
        <input type="submit" value="<?= isLoggedIn() ? 'LogOut' : 'Login!' ?>" class="submit-btn">
    </form>
    <a href="register.php" class="register-link">Don't have an account? Register here!</a>
</div>

<?php
if ($error_message) {
    errorBox($error_message); // Display error message
}
?>
</body>
<?php require INC . '/html-end.php'; ?>
