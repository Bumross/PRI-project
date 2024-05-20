<?php
ob_start(); // Start output buffering

require '../prolog.php';
require INC . '/db.php';
require INC . '/html-begin.php';
require INC . '/nav.php'; // Include navigation
require INC . '/boxes.php'; // Include the boxes.php file where successBox and errorBox functions are defined

$error_message = "";

// If the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['akce']) && $_POST['akce'] === 'register') {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password_again = $_POST['password_again'];

    // Check if passwords match
    if ($password !== $password_again) {
        $error_message = "Passwords do not match.";
    } else {
        // Register the user
        registerUser($name, $password);
        echo '<script>alert("Registration successful."); window.location.href = "login.php";</script>';
        exit; // Stop script execution after redirection
    }
}

ob_end_flush(); // Flush output buffers
?>

<link rel="stylesheet" type="text/css" href="../styles/styles.css">

<div class="login-container">
    <form name="registerForm" method="POST" class="login-form">
        <input type="hidden" name="akce" value="register">
        <div class="input-field">
            <input name="name" type="text" placeholder="Username" required>
        </div>
        <div class="input-field">
            <input name="password" type="password" placeholder="Password" required>
        </div>
        <div class="input-field">
            <input name="password_again" type="password" placeholder="Confirm Password" required>
        </div>
        <input type="submit" value="Register!" class="submit-btn">
    </form>
</div>

<?php
if ($error_message) {
    errorBox($error_message); // Display error message
}
?>
</body>
<?php require INC . '/html-end.php'; ?>
