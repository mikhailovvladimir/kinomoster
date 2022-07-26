<?php

// создал базовый контроллер от которого наледуются все
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['title'] = "Киномонстер, сайт о кино!";

        $this->load->model('news_model');
        $this->data['news'] = $this->news_model->get_news();

        $this->load->model('films_model');
        $this->data['films'] = $this->films_model->get_films_by_rating(10);

        $this->load->helper('form');
    }
}