<!-- Header -->
<?php $this->load->view('partials/header'); ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Tech and Tale</h1>
          <span class="subheading">A Story About Technology and Tale</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <form action="" method="get">
        <p>
        <div class="form-group">
          <label for="search">
            <h4>Search article(s) by title</h4>
          </label><br>
          <?php echo form_input('search', null, 'class="form-control" id="search" placeholder="Type here.."') ?>
        </div>
        <input class="btn btn-primary" type="submit" value="Search">
        </p>
      </form>
      <div class="post-preview">
        <?php
        foreach ($getArticle as $key => $article) : ?>
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
          <hr>
          <a href="<?php echo site_url('article/detail/' . $article['url']); ?>">
            <h2 class="post-title">
              <?php echo $article['title']; ?>
            </h2>
            <h3 class="post-subtitle">
              <?php echo $article['subtitle']; ?>
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#"><?php echo $article['author']; ?></a>
            on <?php echo $article['date']; ?>
          </p>
          <p>
            <a href="<?php echo site_url('article/edit/' . $article['id_article']); ?>">Edit</a> |
            <a href="<?php echo site_url('article/delete/' . $article['id_article']); ?>" onclick="return confirm('Delete: <?php echo $article['title']; ?>?')">Delete</a>
          </p>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<hr>

<!-- Footer -->
<?php $this->load->view('partials/footer'); ?>