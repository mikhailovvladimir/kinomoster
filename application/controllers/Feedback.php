<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends MY_Controller
{
    public function index()
    {
        $this->load->view('templates/header', $this->data);
        $this->load->view('feedback/index', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
}