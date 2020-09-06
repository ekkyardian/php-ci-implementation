<?php

class Article extends CI_Controller
{
    public function index()
    {
        $articleList['getArticle'] = [
            [
                'title'     => 'Computer Science',
                'content'   => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus expedita
                quidem inventore laboriosam asperiores! Nulla, error. Magnam, modi maxime incidunt soluta vitae,
                voluptas ea mollitia quam, ab sunt quibusdam nesciunt.</p>'
            ],

            [
                'title'     => 'Decision Support System',
                'content'   => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus expedita
                quidem inventore laboriosam asperiores! Nulla, error. Magnam, modi maxime incidunt soluta vitae,
                voluptas ea mollitia quam, ab sunt quibusdam nesciunt.</p>'
            ],

            [
                'title'     => 'Machine Learning',
                'content'   => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus expedita
                quidem inventore laboriosam asperiores! Nulla, error. Magnam, modi maxime incidunt soluta vitae,
                voluptas ea mollitia quam, ab sunt quibusdam nesciunt.</p>'
            ]
        ];

        $this->load->view('article', $articleList);
    }
}