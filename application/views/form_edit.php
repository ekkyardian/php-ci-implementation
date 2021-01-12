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
                    <h1>Edit Article</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Content -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
            if ($this->input->post() and $this->form_validation->run() === FALSE) {
                echo "<div class='alert alert-warning'>";
                echo validation_errors();
                echo "</div>";
            }
            ?>
            <?php echo form_open_multipart(); ?>
            <div class="form-group">
                <label for="title">Title</label>
                <?php echo form_input('title', set_value('title', $article['title']), 'class="form-control" id="title"'); ?>
            </div>
            <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <textarea class="form-control" name="subtitle" id="subtitle" rows="2"><?php echo set_value('subtitle', $article['subtitle']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <?php echo form_input('url', set_value('url', $article['url']), 'class="form-control" id="url"'); ?>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <?php echo form_textarea('content', set_value('content', $article['content']), 'class="form-control" id="content"'); ?>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <?php echo form_input('author', set_value('author', $article['author']), 'class="form-control" id="author"'); ?>
            </div>
            <div class="form-group">
                <label for="cover">Cover</label>
                <?php echo form_upload('cover', set_value('cover', $article['cover']), 'class="form-control" id="cover"'); ?>
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<!-- Footer -->
<?php $this->load->view('partials/footer'); ?>