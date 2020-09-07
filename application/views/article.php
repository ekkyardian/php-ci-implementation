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

foreach ($getArticle as $key => $article) :?>
    <!-- 
        site_url()
        Penggunaan site_url() bertujuan agar setiap kali kita membuat link
        (melalui controller/view), link tersebut menjadi absolut dan tidak
        relatif. Pertama atur base url pada file:

        application/config/config.php - base_url

        Selanjutnya panggil method helper('url') pada method yang akan kita
        gunakan, atau masukkan pada __construct method saja supaya lebih
        praktis.
     -->

    <strong><a href="<?= site_url('article/detail/' . $article['url']); ?>">
        <?= '[' . $no . '] ' . $article['title']; ?>
    </a></strong><br>

<?php $no++; endforeach; ?>

</body>
</html>