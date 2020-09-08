<?php

class Article_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getArticles()
    {
        return $this->db->get('article');
        /*
         * Kode query builder di atas sama dengan kode:
         * return $this->db->query("SELECT * FROM article");
         */
    }

    public function getSingleArticle($url)
    {
        $this->db->where('url', $url);
        /*
         * Argumen pertama: nama_kolom yang dijadikan kunci pencarian WHERE
         * Argumen kedua: isi yang ingin dicari
         * --> ('url', $url) == WHERE url = '$url'
         */

        return $this->db->get('article');
        
        /*
         * Dia baris kode di atas merupakan bentuk penyederhanaan dari kode:
         * $query = $this->db->query("SELECT * FROM article WHERE url = '$url'")
         * 
         * selain dua baris kode di atas ada juga cara lain yang bisa digunakan.
         * Yaitu dengan menggunakan method get_where(). Berikut adalah kode
         * lengkapnya:
         * 
         * return $this->db->get_where('article', array('url'=>$id))
         * atau
         * return $this->db->get_where('article', ['url'=>$id])
         */
    }
}