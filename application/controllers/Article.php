<?php

class Article extends CI_Controller
{
    public function index()
    {
        $this->load->database();
        $query = $this->db->get('article');
        /*
         * Kode query builder di atas sama dengan kode:
         * $query = $this->db->query("SELECT * FROM article");
         * 
         * Hasil/outputnya sama saja, hanya perintahnya saja yang lebih
         * disederhanakan
         */
        $articleList['getArticle'] = $query->result_array();

        $this->load->view('article', $articleList);
    }
}