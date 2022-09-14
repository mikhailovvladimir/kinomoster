<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Movies extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('comments_model');
    }

    public function view($slug = null)
    {
        $movie_slug = $this->films_model->get_films($slug, false, false);

        if (empty($movie_slug)) {
            show_404();
        }

        $this->data['user_id'] = $this->dx_auth->get_user_id();

        $this->load->helper(['form', 'url', 'url_helper']);
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'comment-text',
            'Комментарий',
            'required'
        );

        $this->data['comments'] = $this->comments_model->get_comments($movie_slug['id'], 100);

        $this->data['title'] = $movie_slug['name'];
        $this->data['year'] = $movie_slug['year'];
        $this->data['rating'] = $movie_slug['rating'];
        $this->data['description_movie'] = $movie_slug['descriptions'];
        $this->data['player_code'] = $movie_slug['player_code'];

        if ($this->form_validation->run()) {
            $this->comments_model->add_comments($movie_slug['id']);
            $filmSlug = $this->uri->segment(3);
            redirect('/movies/view/' . $filmSlug, 'location');
        }

        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/view', $this->data);
        $this->load->view('templates/footer', $this->data);
    }

    public function type($slug = null)
    {
        $this->load->library('pagination');
        $this->data['movie_data'] = null;

        $offset = (int)$this->uri->segment(4);
        $count_films_on_page = 4;

        if ($slug === "films") {
            // сколько всего фильмов
            $count_films = $this->films_model->get_count_movies_by_category_id(1);
            $url_pagination = '/movies/type/films';
            $this->data['title'] = 'Фильмы';
            $category_id = 1;
            $this->data['movie_data'] = $this->films_model->get_movies_on_page($count_films_on_page, $offset, $category_id);
        }

        if ($slug === 'serials') {
            $this->data['title'] = 'Сериалы';
            $url_pagination = '/movies/type/serials';
            $count_films = $this->films_model->get_count_movies_by_category_id(2);
            $category_id = 2;
            $this->data['movie_data'] = $this->films_model->get_movies_on_page($count_films_on_page, $offset, $category_id);
        }

        if (empty($this->data['movie_data'])) {
            show_404();
        }

        $pagination_config = get_pagination_config($count_films ?? false, $count_films_on_page, $url_pagination ?? false);

        //init pagination
        $this->pagination->initialize($pagination_config);
        $this->data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/type', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
}