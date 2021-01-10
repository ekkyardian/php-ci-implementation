<!-- Header -->
<?php $this->load->view('partials/header'); ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Add New Article</h1>
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
                <?php echo form_input('title', null, 'class="form-control" id="title"'); ?>
            </div>
            <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <?php
                // echo form_textarea('subtitle', null, 'class="form-control" id="subtitle"');
                ?>
                <textarea class="form-control" name="subtitle" id="subtitle" rows="2"></textarea>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <?php echo form_input('url', null, 'class="form-control" id="url"'); ?>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <?php echo form_textarea('content', null, 'class="form-control" id="content"'); ?>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <?php echo form_input('author', null, 'class="form-control" id="author"') ;?>
            </div>
            <div class="form-group">
                <label for="cover">Cover</label>
                <?php echo form_upload('cover', null, 'class="form-control" id="cover"'); ?>
            </div>
            <button class="btn btn-primary" type="submit">Publish</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- Footer -->
<?php $this->load->view('partials/footer'); ?>