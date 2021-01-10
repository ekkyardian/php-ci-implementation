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
        
        $this->load->model('Article_model');
    }

    // -------------------------------------------------------------------------

    public function index()
    {
        // $query = $this->Article_model->getSingleArticle('id_article', $id);
        // $data['article'] = $query->row_array();

        $query = $this->Article_model->getArticles();
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
        if ($this->input->post()) { // Validasi inputan tidak kosong
            
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

            /*
             * Validasi terkait gambar yang diupload. Jika gambar yang diupload
             * tidak memenuhi spesifikasi yang tertera pada array $coverConfig
             * maka akan menampilkan pesan error. Tetapi jika semuanya sudah
             * sesuai spesifikasi maka data file_name gambar tersebut akan
             * ditambahkan kedalam array $coverConfig
             */
            if (!$this->upload->do_upload('cover')) {
                echo $this->upload->display_error();
            }
            else {
                $dataArticle += ['cover' => $this->upload->data()['file_name']];
            }

            $id = $this->Article_model->insertArticle($dataArticle);
            
            if ($id) {
                echo "Data has been saved to database";
                redirect('/');
            }
            else {
                echo "Error! Data cannot be saved";
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

        // Update data to database
        if ($this->input->post()) {
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

            /*
             * Validasi terkait gambar yang diupload. Jika gambar yang diupload
             * tidak memenuhi spesifikasi yang tertera pada array $coverConfig
             * maka akan menampilkan pesan error. Tetapi jika semuanya sudah
             * sesuai spesifikasi maka data file_name gambar tersebut akan
             * ditambahkan kedalam array $coverConfig
             */
            if (!$this->upload->do_upload('cover')) {
                echo $this->upload->display_error();
            } else {
                $dataArticle += ['cover' => $this->upload->data()['file_name']];
            }

            $id = $this->Article_model->updateArticle($id, $dataArticle);

            if ($id) {
                echo "Data has been updated";
            }
            else {
                echo "Error! Data cannot be updated";
            }
        }

        $this->load->view('form_edit', $data);
    }

    // -------------------------------------------------------------------------

    public function delete($id)
    {
        $this->Article_model->deleteArticle($id);
        redirect(site_url('article/index'));
    }
}
