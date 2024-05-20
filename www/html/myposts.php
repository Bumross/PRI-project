<?php // vypsat drinky:
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
require INC . '/xmlTools.php';
require INC . '/db.php';
?>

<h1 class="py-6 text-center text-5xl">My Posts</h1>

<div class="bg-zinc-50 flex justify-center">
    <ol class="fa-ul">
        <?php foreach (xmlFileList(DRINKS) as $basename) { ?>
            <li>
                <i class="fa fa-li fa-glass"></i>
                <a class="hover:underline" href="?drink=<?= $basename ?>">
                    <?= $basename ?> (<?= views($basename) ?>)
                </a>
            </li>
        <?php } ?>
    </ol>
</div>

<section class="flex justify-center">
    <?php
    if ($drink = @$_GET['drink']) {
        if (TRANSFORM_SERVER_SIDE) { ?>
            <?= xmlTransform(DRINKS . "/$drink.xml", XML . '/post.xsl') ?>
        <?php } else { ?>
            <h2 id="name" class="text-center text-2xl m-4" />
            <script>
                loadXML(
                    "/serve/getDrink.php?drink=<?= $drink ?>",
                    (xmlDom) => {
                        // zde je možné pracovat s DOM ...
                        document.getElementById("name").innerHTML =
                            xmlDom.getElementsByTagName("name")[0].textContent;
                        // ... atd.
                    })
            </script>
        <?php }
    } ?>
</section>

<?php require INC . '/html-end.php';