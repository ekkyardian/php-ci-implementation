<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
</head>
<body>

<h1>List of Article</h1>
<?php

$no = 1;

foreach ($getArticle as $key => $article) {
    echo "<strong>[$no] " . $article['title'] . '</strong><br>';
    echo $article['content'];
    echo "<a href='#'>Read more..</a>";
    echo '<hr>';
    $no++;
}

?>

</body>
</html>