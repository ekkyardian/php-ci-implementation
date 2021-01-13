<?php

class Article extends CI_Controller
{
    public function __construct()
    {
        /*
         * Kita dapat memanfaatkan magic method __construct untuk memanggil
         * method bawaan CI yang kita rasa akan sangat sering dignakan. Pada
         * kasus ini, kita akan menambahkan method helper() ke dalam magic
         * method __construct
         * 
         * Pehatian! Perlu diingat ketika kita akan membuat sebuah method
         * __construct pada suatu class, pastikan untuk memanggil fungsi:
         * 
         * parent::__construct()
         */

        parent::__construct();

        /*
         * Helper url dan form di load melalui autoload helper dengan asusmsi
         * bahwa semua/sebagian besar file controller akan menggunakan helper
         * tersebut untuk kebutuhan view
         */
        $this->load->library('session');

        $this->load->model('Article_model');
    }

    // -------------------------------------------------------------------------

    public function index($offset = 0)
    {
        $this->load->library('pagination');

        $config['base_url']     = site_url('article/index');
        $config['total_rows']   = $this->Article_model->getTotalArticle();
        $config['per_page']     = 2;

        $this->pagination->initialize($config);

        $query = $this->Article_model->getArticles($config['per_page'], $offset);
        $arr['getArticle'] = $query->result_array();
        
        $this->load->view('article', $arr);
    }

    // -------------------------------------------------------------------------

    public function detail($url)
    {
        $query = $this->Article_model->getSingleArticle('url', $url);
        $arr['article'] = $query->row_array();

        $this->load->view('detail', $arr);
    }

    // -------------------------------------------------------------------------

    public function add()
    {
        /*
         * Membuat rule valudasi menggunakan library form_validaton (di load
         * melalui autoload).
         * 
         * Keterangan:
         * Argumen ke-1 = Nama field
         * Argumen ke-2 = Nama yang akan di mention ketika rule tidak terpenuhi
         * Argumen ke-3 = Rule (cek dokumentasi form_validasi untuk informasi
         * rule lain yang tersedia)
         */
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('subtitle', 'Subtitle', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');
        
        if ($this->form_validation->run() === TRUE) { // Validasi rule
            
            $dataArticle = [
                'title'         => $this->input->post('title'),
                'subtitle'      => $this->input->post('subtitle'),
                'url'           => $this->input->post('url'),
                'content'       => $this->input->post('content'),
                'author'        => $this->input->post('author' )
            ];

            // Konfigurasi gambar cover yang akan diupload
            $coverConfig = [
                'upload_path'   => './uploads/',
                'allowed_types' => 'gif|jpg|png',
                'max_size'      => '100',
                'max_width'     => '1024',
                'max_height'    => '768'
            ];

            $this->load->library('upload', $coverConfig);
            $this->upload->do_upload('cover');

            /*
             * Validasi terkait gambar yang diupload. Jika gambar yang diupload
             * tidak memenuhi spesifikasi yang tertera pada array $coverConfig
             * maka akan menampilkan pesan error. Tetapi jika semuanya sudah
             * sesuai spesifikasi maka data file_name gambar tersebut akan
             * ditambahkan kedalam array $coverConfig
             */
            if (!empty($this->upload->data()['file_name'])) {
                $dataArticle += ['cover' => $this->upload->data()['file_name']];
            }

            $id = $this->Article_model->insertArticle($dataArticle);
            
            if ($id) {
                $this->session->set_flashdata('message-add-success', 'Data has been saved to database');
                redirect('/');
            }
            else {
                $this->session->set_flashdata('message-add-failed', 'Error! Data cannot be saved');
                redirect('/');
            }
        }

        $this->load->view('form_add');
    }

    // -------------------------------------------------------------------------

    public function edit($id)
    {
        // Get data from database (edit)
        $query = $this->Article_model->getSingleArticle('id_article', $id);
        $data['article'] = $query->row_array();

        // Rule form edit
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('subtitle', 'Subtitle', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');

        // Update data to database
        if ($this->form_validation->run() === TRUE) {
            $dataArticle = [
                'title'     => $this->input->post('title'),
                'subtitle'  => $this->input->post('subtitle'),
                'url'       => $this->input->post('url'),
                'content'   => $this->input->post('content'),
                'author'    => $this->input->post('author')
            ];

            // Konfigurasi gambar cover yang akan diupload
            $coverConfig = [
                'upload_path'   => './uploads/',
                'allowed_types' => 'gif|jpg|png',
                'max_size'      => '100',
                'max_width'     => '1024',
                'max_height'    => '768'
            ];

            $this->load->library('upload', $coverConfig);
            $this->upload->do_upload('cover');

            /*
             * Proses berikut melakukan pengecekan terhadap input cover. Jika
             * pada input cover terdapat file (artinya user melakukan upload
             * cover baru saat edit data), maka cover tersebut akan diuplod dan
             * file name akan ditambahkan pada array $dataArticle. Namun, jika
             * tidak melakukan upload cover baru, maka tidak akan ada aksi
             * tambahan (data cover tidak diperbaharui)
             */
            if (!empty($this->upload->data()['file_name'])) {
                $dataArticle += ['cover' => $this->upload->data()['file_name']];
            }

            $id = $this->Article_model->updateArticle($id, $dataArticle);

            if ($id) {
               $this->session->set_flashdata('message-update-success', 'Data has been updated');
               redirect('/');
            }
            else {
                $this->session->set_flashdata('message', 'Error! Data cannot be updated');
                redirect('/');
            }
        }

        $this->load->view('form_edit', $data);
    }

    // -------------------------------------------------------------------------

    public function delete($id)
    {
        $this->Article_model->deleteArticle($id);
        
        if ($id) {
            $this->session->set_flashdata('message-delete-success', 'Data has been deleted');
            redirect(site_url('/'));
        }
        else {
            $this->session->flashdata('message-delete-failed', 'Error! Data cannot be deleted');
            redirect(site_url('/'));
        }
    }
}
