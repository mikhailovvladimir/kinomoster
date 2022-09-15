<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rating extends MY_Controller
{
    public function movies_list()
    {
        $this->load->library('pagination');
        $count_movies = $this->films_model->get_count_movies();
        $offset = (int)$this->uri->segment(2);

        $count_films_on_page = 4;
        $this->data['movie_data'] = $this->films_model->get_movies_by_rating_on_page($count_films_on_page, $offset);

        if (empty($this->data['movie_data'])) {
            show_404();
        }

        $url_pagination = '/rating';
        $pagination_config = get_pagination_config($count_movies, $count_films_on_page, $url_pagination);

        //init pagination
        $this->pagination->initialize($pagination_config);
        $this->data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $this->data);
        $this->load->view('rating/movies_list', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
}