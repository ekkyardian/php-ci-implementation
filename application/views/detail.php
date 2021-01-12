<!-- Header -->
<?php $this->load->view('partials/header'); ?>

<!-- Page Header -->
<?php
/*
 * Mengecek ketersediaan cover. Apabila artikel memiliki cover maka akan di-
 * tampilkan cover tersebut. Namun, bila artikel tidak memiliki cover maka
 * yang akan ditampilkan adalah cover default
 */
if (!empty($article['cover'])) {
    $cover = base_url() . 'uploads/' . $article['cover'];
} else {
    $cover = base_url() . 'assets/img/post-bg.jpg' . $article['cover'];
}
?>
<header class="masthead" style="background-image: url('<?php echo $cover; ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1><?php echo $article['title']; ?></h1>
                    <span class="subheading"><?php echo $article['subtitle']; ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p><?php echo $article['content']; ?></p>
                <p class="post-meta">Posted by
                    <a href="#"><?php echo $article['author']; ?></a>
                    on <?php echo $article['date']; ?>
                </p>
                <p>
                    <a href="<?php echo site_url('article/edit/' . $article['id_article']); ?>">Edit</a> |
                    <a href="<?php echo site_url('article/delete/' . $article['id_article']); ?>" onclick="return confirm('Delete: <?php echo $article['title']; ?>?')">Delete</a>
                </p>
            </div>
        </div>
    </div>
</article>

<hr>

<!-- Footer -->
<?php $this->load->view('partials/footer'); ?>