<?php

class Article_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        /*
         * Libraries database di load melalui autoload librari dengan asusmsi
         * bahwa semua/sebagian besar controller akan menggunakan librari
         * tersebut
         */
    }

    public function getArticles($limit, $offset)
    {
        $filter = $this->input->get('search');
        $this->db->like('title', $filter);
        $this->db->limit($limit, $offset);
        $this->db->order_by('date', 'DESC');
        
        return $this->db->get('article');
        /*
         * Kode query builder di atas sama dengan kode:
         * return $this->db->query("SELECT * FROM article");
         */

    }

    public function getSingleArticle($field, $value)
    {
        $this->db->where($field, $value);
        /*
         * Argumen pertama: nama_kolom yang dijadikan kunci pencarian WHERE
         * Argumen kedua: isi yang ingin dicari
         * --> ('url', $url) == WHERE url = '$url'
         */

        return $this->db->get('article');
        
        /*
         * Dua baris kode di atas merupakan bentuk penyederhanaan dari kode:
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

    public function getTotalArticle() {
        $filter = $this->input->get('search');
        $this->db->like('title', $filter);

        return $this->db->count_all_results('article');
    }

    public function insertArticle($dataArticle)
    {
        /*
        * Keterangan argumen pada query builder insert:
        * Argumen ke-1 = nama table
        * Argumen ke-2 = array yang menampung data inputan
        */
        $this->db->insert('article', $dataArticle);
        
        // Memberikan umpan balik, melakukan pengecekan apakah terjadi penam-
        // bahan data ke database? Jika iya, maka akan mentrigger kondisi if
        // yang sudah dideklarasikan di controler Article/add.
        return $this->db->insert_id();
    }

    public function updateArticle($id, $dataArticle)
    {
        $this->db->where('id_article', $id);
        $this->db->update('article', $dataArticle);

        // Memberikan umpan balik, melakukan pengecekan apakah terjadi peruba-
        // han data? Jika iya, maka akan mentrigger kondisi if yang sudah di-
        // deklarasikan di controler Article/edit.
        return $this->db->affected_rows();
    }

    public function deleteArticle($id)
    {
        $this->db->where('id_article', $id);
        $this->db->delete('article');
        return $this->db->affected_rows();
    }
}