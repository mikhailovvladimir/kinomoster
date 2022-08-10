<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Movies extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function view($slug = null)
    {
        $movie_slug = $this->films_model->getFilms($slug, false, false);

        if (empty($movie_slug)) {
            show_404();
        }

        $this->load->model('comments_model');
        $this->data['comments'] = $this->comments_model->getComments($movie_slug['id'], 100);

        $this->data['title'] = $movie_slug['name'];
        $this->data['year'] = $movie_slug['year'];
        $this->data['rating'] = $movie_slug['rating'];
        $this->data['description_movie'] = $movie_slug['descriptions'];
        $this->data['player_code'] = $movie_slug['player_code'];

        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/view', $this->data);
        $this->load->view('templates/footer', $this->data);
    }

    public function type($slug = null) 
    {
        $this->load->library('pagination');
        $this->data['movie_data'] = null;

        $offset = (int) $this->uri->segment(4);

        // фильмов на странице отображаться
        $row_count = 2;

        if ($slug === "films") {
            // сколько всего фильмов
            $count = count($this->films_model->getFilms(0, 1));

            // параметр относящийся к библиотеке пагинация
            $p_config['base_url'] = '/movies/type/filmls';
            $this->data['title'] = 'Фильмы';
            $this->data['movie_data'] = $this->films_model->getMoviesOnPage($row_count, $offset, 1);
        }

        if ($slug === 'serials') {
            $this->data['title'] = 'Сериалы';
            $p_config['base_url'] = '/movies/type/serials';
            $count = count($this->films_model->getFilms(0, 1));
            $this->data['movie_data'] = $this->films_model->getMoviesOnPage($row_count, $offset, 1);
        }

        if (empty($this->data['movie_data'])) {
            show_404();
        }

        // pagination config

        $p_config['total_rows'] = $count ?? 0;
        $p_config['per_page'] = $row_count;

        $p_config['full_tag_open'] = "<ul class='pagination'>";
		$p_config['full_tag_close'] ="</ul>";
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
        $this->load->view('movies/type', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
}