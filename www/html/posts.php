<?php
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
require INC . '/xmlTools.php';
require INC . '/db.php';

$filterType = null;
if (isset($_GET['type'])) {
    $filterType = $_GET['type'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <script>
        // Function to submit the form when a checkbox is clicked
        function submitFilterForm() {
            document.getElementById("filterForm").submit();
        }
    </script>
</head>
<body>
<div class="type-filter">
    <h2>Filter by Type:</h2>
    <form id="filterForm" action="" method="GET">
        <?php
        // Get unique types
        $uniqueTypes = getUniqueTypes(POSTS);

        // Display checkboxes for each type
        foreach ($uniqueTypes as $type) {
            $isChecked = ($filterType === $type) ? 'checked' : '';
            echo "<label><input type='checkbox' name='type' value='$type' $isChecked onclick='submitFilterForm()'> $type</label>";
        }
        ?>
    </form>
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
<div class="grid-container">
    <?php
    // Display filtered posts or all posts if no type is selected
    foreach (xmlFileList(POSTS) as $basename) {
        $filePath = POSTS . "/$basename.xml";
        if (file_exists($filePath) && is_readable($filePath)) {
            $xml = simplexml_load_file($filePath);

            if ($xml) {
                $brand = (string) $xml->AlcoholExperience->Brand;
                $type = (string) $xml->AlcoholExperience->Type;

                // Check if the post matches the filter type, or display all if no filter
                if ($filterType === null || $filterType === $type) {
                    ?>
                    <div class="content-box">
                        <h5><?= htmlspecialchars($brand) ?></h5>
                        <h5><?= htmlspecialchars($type) ?></h5>
                        <a class="register-link" href="?post=<?= htmlspecialchars($basename) ?>">More</a>
                    </div>
                    <?php
                }
            }
        }
    }

    ?>
</div> <!-- End grid-container -->
<?php require INC . '/html-end.php'; ?>
</body>
</html>