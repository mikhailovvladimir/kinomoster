<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function index()
    {
        $data['title'] = 'Все новости';
        $data['news'] = $this->news_model->getNews();
        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = null)
    {
        $data['news_item'] = $this->news_model->getNews($slug);
        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $data['content'] = $data['news_item']['text'];
        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
    
    public function create()
    {
        $data['title'] = 'добавить новость';

        // получаем значение из формы
        if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {
            //не валидируются данные
            $slug = $this->input->post('slug');
            $title = $this->input->post('title');
            $text = $this->input->post('text');

            if ($this->news_model->setNews($slug, $title, $text)) {
                $this->load->view('templates/header', $data);
                $this->load->view('news/success', $data);
                $this->load->view('templates/footer');
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create', $data);
            $this->load->view('templates/footer');
        }
    }

    public function edit($slug = null)
    {
        $data['title'] = 'редактировать новость';
        $data['news_item'] = $this->news_model->getNews($slug);

        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title_news'] = $data['news_item']['title'];
        $data['content_news'] = $data['news_item']['text'];
        $data['slug_news'] = $data['news_item']['slug'];

        if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {
            //не валидируются данные
            $slug = $this->input->post('slug');
            $title = $this->input->post('title');
            $text = $this->input->post('text');

            if ($this->news_model->updateNews($slug, $title, $text)) {
                echo 'новость успешно отредактированна';
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('news/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($slug = null)
    {
        $data['news'] = $this->news_model->getNews($slug);

        if (empty($data['news'])) {
            show_404();
        }

        $data['title'] = 'удалить новость';
        $data['result'] = 'Ошибка удаления' . $data['news']['title'];

        if ($this->news_model->deleteNews($slug)) {
            $data['result'] = $data['news']['title'] . ' успешно удалена';
        }

        $this->load->view('templates/header', $data);
        $this->load->view('news/delete', $data);
        $this->load->view('templates/footer');
    }
}