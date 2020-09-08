<?php

class Article extends CI_Controller
{
    public function __construct()
    {
        /*
         * Kita dapat memanfaatkan magic method __construct untuk memanggil
         * method bawaan CI yang kita rasa kana sangat sering dignakan. Pada
         * kasus ini, kita akan menambahkan method helper() ke dalam magic
         * method __construct
         * 
         * Pehatian! Perlu diingat ketika kita akan membuat sebuah method
         * __construct pada suatu class, pastikan untuk memanggil fungsi:
         * 
         * parent::__construct()
         */

        parent::__construct();
        
        $this->load->helper('url');
        $this->load->model('Article_model');
    }

    public function index()
    {
        $query = $this->Article_model->getArticles();
        $arr['getArticle'] = $query->result_array();
        
        $this->load->view('article', $arr);
    }

    public function detail($url)
    {
        $query = $this->Article_model->getSingleArticle($url);
        $arr['article'] = $query->row_array();

        $this->load->view('detail', $arr);
    }
}