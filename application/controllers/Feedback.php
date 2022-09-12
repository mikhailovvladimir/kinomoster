<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends MY_Controller
{
    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('feedback_model');

        $config = [
            [
                'field' => 'name',
                'label' => 'Имя',
                'rules' => 'required|alpha_numeric_spaces|max_length[100]|min_length[5]'
            ],

            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required|valid_email|max_length[100]|min_length[5]'
            ],

            [
                'field' => 'text',
                'label' => 'Текст',
                'rules' => 'required|alpha_numeric_spaces|max_length[1000]|min_length[60]'
            ]
        ];

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {
            $this->feedback_model->sendFeedback();
            $this->data['success'] = 'Ваше сообщение успешно доставлено!';

            $this->load->view('templates/header', $this->data);
            $this->load->view('feedback/success', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->load->view('templates/header', $this->data);
            $this->load->view('feedback/index', $this->data);
            $this->load->view('templates/footer', $this->data);
        }
    }
}