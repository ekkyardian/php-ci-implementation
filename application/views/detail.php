<!-- Header -->
<?php $this->load->view('partials/header'); ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/img/home-bg.jpg')">
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
            </div>
        </div>
    </div>
</article>

<hr>

<!-- Footer -->
<?php $this->load->view('partials/footer'); ?>