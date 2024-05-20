<?php
// nahrát recept
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
require INC . '/boxes.php';
require INC . '/xmlTools.php';

if (!isLoggedIn()) {
    die;
}
?>

<link rel="stylesheet" type="text/css" href="../styles/styles.css">

<div class="login-container">
    <form class="login-form" enctype="multipart/form-data" method="POST">
        <div class="input-field">
            <label for="fileInput">Upload Recipe:</label>
            <input id="fileInput" name="xml" type="file" accept="text/xml" data-max-file-size="2M" required>
        </div>
        <input type="submit" value="Submit" class="submit-btn">
    </form>
</div>

<?php
if (($xmlFile = @$_FILES['xml']) && ($tmpName = @$xmlFile['tmp_name'])) {
    $isValid = xmlValidate($tmpName, XML . '/post.xsd');
    if (!$isValid) {
        errorBox('The XML file is not valid.');
    } else {
        $post = $xmlFile['name'];
        $target = POSTS . "/$post";
        if (file_exists($target)) {
            errorBox('Recipe already exists.');
        } elseif (rename($tmpName, $target)) {
            successBox("OK - $post - uploaded");
        }
    }
}
require INC . '/html-end.php';
?>

<?php
require INC . '/html-end.php';
?>
