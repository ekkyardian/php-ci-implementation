<?php

class Article extends CI_Controller
{
    public function __construct()
    {
        /*
         * Kita dapat memanfaatkan magic method __construct untuk memanggil
         * method bawaan CI yang kita rasa kana sangat sering dignakan. Pada
         * kasus ini, kita akan menambahkan method database() dan helper()
         * ke dalam method __construct
         * 
         * Pehatian! Perlu diingat ketika kita akan membuat sebuah method
         * __construct pada suatu class, pastikan untuk memanggil fungsi:
         * 
         * parent::__construct()
         * 
         * dalam method __construct yang hendak kita buat.
         */

        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
    }

    public function index()
    {
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

    public function detail($url)
    {
        $this->db->where('url', $url);
        /*
         * Argumen pertama: nama_kolom yang dijadikan kunci pencarian WHERE
         * Argumen kedua: isi yang ingin dicari
         * --> ('url', $url) == WHERE url = '$url'
         */

        $query = $this->db->get('article');
        
        /*
         * Kode di atas merupakan bentuk penyederhanaan dari kode:
         * $query = $this->db->query("SELECT * FROM article WHERE url = '$url'")
         * 
         * selain dua baris kode di atas ada juga cara lain yang bisa digunakan.
         * Yaitu dengan menggunakan method get_where(). Berikut adalah kode
         * lengkapnya:
         * 
         * $query = $this->db->get_where('article', array('url'=>$id))
         * atau
         * $query = $this->db->get_where('article', ['url'=>$id])
         */
        
         $data['article'] = $query->row_array();

        $this->load->view('detail', $data);
    }
}