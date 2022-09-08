<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends MY_Controller
{
    public function movies_list()
    {
        $this->load->library('pagination');
        $count_movies = $this->films_model->get_count_movies();
        $p_config['base_url'] = '/rating';

        $offset = (int)$this->uri->segment(2);

        // фильмов на странице отображаться
        $row_count = 4;
        $this->data['movie_data'] = $this->films_model->getMoviesByRatingOnPage($row_count, $offset);

        if (empty($this->data['movie_data'])) {
            show_404();
        }

        // pagination config
        $p_config['total_rows'] = $count_movies ?? 0;
        $p_config['per_page'] = $row_count;

        $p_config['full_tag_open'] = "<ul class='pagination'>";
        $p_config['full_tag_close'] = "</ul>";
        $p_config['num_tag_open'] = '<li>';
        $p_config['num_tag_close'] = '</li>';
        $p_config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $p_config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $p_config['next_tag_open'] = "<li>";
        $p_config['next_tagl_close'] = "</li>";
        $p_config['prev_tag_open'] = "<li>";
        $p_config['prev_tagl_close'] = "</li>";
        $p_config['first_tag_open'] = "<li>";
        $p_config['first_tagl_close'] = "</li>";
        $p_config['last_tag_open'] = "<li>";
        $p_config['last_tagl_close'] = "</li>";

        //init pagination
        $this->pagination->initialize($p_config);

        $this->data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $this->data);
        $this->load->view('rating/movies_list', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
}