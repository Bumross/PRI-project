<?php // přečti a odešli XML soubor s receptem

$post = @$_GET['post'];
$file = "/var/mydb/posts/$post.xml";

header("Content-type: text/xml;");
if (file_exists($file))
    readfile($file);