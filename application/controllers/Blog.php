<?php

class Blog extends CI_Controller
{
    public function index($nama, $level)
    {
        $data = [
            'ary_nama'  => $nama,
            'ary_level' => $level
        ];
        
        /*
         * Untuk mengirim argument yang ditangkap oleh method ke file view, kita
         * dapat melakukannya dengan cara menyimpan orgumen tersebut kedalam
         * array. Kemudian array tersebut yang dimasukkan dalam argumen:
         * 
         * $this->load->view('view_file', $array)
         * 
         * Perlu diketahui bahwa dalam fungsi di atas kita haya bisa mengirimkan
         * maksimal 2 argumen, 1 untuk nama file view, dan satu lagi bisa kita
         * gunakan untuk keperluan pengiriman data argumen yang ditangkap oleh
         * method.
         * 
         * Dan satu informasi penting lainnya adalah, data yang bisa dikirim ke
         * dalam argumen di atas HARUS BERTIPE ARRAY! Camkan itu!
         */

        $this->load->view('blog', $data); // Maks. 2 argumen
    }
    
    public function biodata($nama, $pekerjaan)
    {
        echo 'Nama: ' . $nama . '.<br>';
        echo 'Pekerjaan: ' . $pekerjaan . '.<br>';
    }
}