<?php
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
require INC . '/xmlTools.php';
require INC . '/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
<div class="grid-container">
    <?php
    foreach (xmlFileList(POSTS) as $basename) {
        $filePath = POSTS . "/$basename.xml";

        if (file_exists($filePath) && is_readable($filePath)) {
            $xml = simplexml_load_file($filePath);

            if ($xml) {
                // Extract Brand and Type from XML
                $brand = (string) $xml->AlcoholExperience->Brand;
                $type = (string) $xml->AlcoholExperience->Type;

                ?>
                <div class="content-box">
                    <h5><?= htmlspecialchars($brand) ?></h2>
                    <h5><?= htmlspecialchars($type) ?></h3>
                    <a class="register-link" href="?post=<?= htmlspecialchars($basename) ?>">More</a>
                </div>
                <?php
            } else {
                echo "<p class='text-red-500'>Error loading XML file: $filePath</p>";
            }
        } else {
            echo "<p class='text-red-500'>File does not exist or is not readable: $filePath</p>";
        }
    }
    ?>
</div>



<?php
// Display XSL-transformed content if a post is selected
if (isset($_GET['post'])) {
    $post = $_GET['post'];
    $filePath = POSTS . "/$post.xml";
    if (file_exists($filePath) && is_readable($filePath)) {
        $transformedXml = xmlTransform($filePath, XML . '/post.xsl');
        
        if ($transformedXml) {
            ?>
            <div class="post-content">
                <?= $transformedXml ?>
            </div>
            <?php
        } else {
            echo "<p class='text-red-500'>Error transforming XML file: $filePath</p>";
        }
    } else {
        echo "<p class='text-red-500'>File does not exist or is not readable: $filePath</p>";
    }
}
?>

<?php require INC . '/html-end.php'; ?>

</body>
</html>
