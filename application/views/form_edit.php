<!-- Header -->
<?php $this->load->view('partials/header'); ?>

<!-- Page Header -->
<?php
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
            <?php echo form_open_multipart(); ?>
            <div class="form-group">
                <label for="title">Title</label>
                <?php echo form_input('title', $article['title'], 'class="form-control" id="title"'); ?>
            </div>
            <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <textarea class="form-control" name="subtitle" id="subtitle" rows="2"><?php echo $article['subtitle']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <?php echo form_input('url', $article['url'], 'class="form-control" id="url"'); ?>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <?php echo form_textarea('content', $article['content'], 'class="form-control" id="content"'); ?>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <?php echo form_input('author', $article['author'], 'class="form-control" id="author"'); ?>
            </div>
            <div class="form-group">
                <label for="cover">Cover</label>
                <?php echo form_upload('cover', $article['cover'], 'class="form-control" id="cover"'); ?>
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<!-- Footer -->
<?php $this->load->view('partials/footer'); ?>