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
            <!-- 
                Proses pengecekan, jika terjadi proses POST dan rule validasi
                tidak terpenuhi (field required tidak diisi), maka akan menam-
                pilkan pesan error. Data tidak disimpan ke database.
             -->
            <?php
            if ($this->input->post() and $this->form_validation->run() === FALSE) {
                echo "<div class='alert alert-warning'>";
                echo validation_errors();
                echo "</div>";
            }
            ?>
            <div class="form-group">
                <label for="title">Title <span style="color: red;">*</span></label>
                <!-- 
                    Catatan. form_input merupakan fitur bawaan dari Codeigniter
                    (di-load melalui autoload)
                    
                    Argumen ke-1 = Nama Field
                    Argumen ke-2 = Value
                    Argumen ke-3 = Atribut lain yang diperlukan

                    fungsi dari set_value('nama_field') adalah untuk menyimpan
                    value yang sudah diketik oleh user pada field secara
                    sementara. Bertujuan agar apabila halaman ter-refresh data
                    yang sudah diketik tidak hilang di field input.
                 -->
                <?php echo form_input('title', set_value('title'), 'class="form-control" id="title"'); ?>
            </div>
            <div class="form-group">
                <label for="subtitle">Subtitle <span style="color: red;">*</span></label>
                <?php echo form_input('subtitle', set_value('subtitle'), 'class="form-control" id="subtitle"'); ?>
            </div>
            <div class="form-group">
                <label for="url">URL <span style="color: red;">*</span></label>
                <?php echo form_input('url', set_value('url'), 'class="form-control" id="url"'); ?>
            </div>
            <div class="form-group">
                <label for="content">Content <span style="color: red;">*</span></label>
                <?php echo form_textarea('content', set_value('content'), 'class="form-control" id="content"'); ?>
            </div>
            <div class="form-group">
                <label for="author">Author <span style="color: red;">*</span></label>
                <?php echo form_input('author', set_value('author'), 'class="form-control" id="author"'); ?>
            </div>
            <div class="form-group">
                <label for="cover">Cover</label>
                <?php echo form_upload('cover', set_value('cover'), 'class="form-control" id="cover"'); ?>
            </div>
            <button class="btn btn-primary" type="submit">Publish</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- Footer -->
<?php $this->load->view('partials/footer'); ?>