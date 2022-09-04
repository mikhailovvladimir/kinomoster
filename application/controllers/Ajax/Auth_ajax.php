<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_ajax extends MY_Controller
{
    // Used for registering and changing password form validation
    var $min_username = 4;
    var $max_username = 20;
    var $min_password = 4;
    var $max_password = 20;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('Form_validation');
        $this->load->library('DX_Auth');

        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function login()
    {
        $error_message = false;
        if (!$this->dx_auth->is_logged_in()) {
            $val = $this->form_validation;

            // Set form validation rules
            $val->set_rules('username', 'Username', 'trim|required');
            $val->set_rules('password', 'Password', 'trim|required');
            $val->set_rules('remember', 'Remember me', 'integer');
            $this->data['show_captcha'] = FALSE;


            if ($val->run() and
                $this->dx_auth->login(
                    $val->set_value('username'),
                    $val->set_value('password'),
                    $val->set_value('remember')
                )
            ) {
                echo json_encode('OK');
            } else {
                // Check if the user is failed logged in because user is banned user or not
                if ($this->dx_auth->is_banned()) {
                    // Redirect to banned uri
                    $this->dx_auth->deny_access('banned');
                    $error_message = $this->dx_auth->get_auth_error();
                } else {
                    // Default is we don't show captcha until max login attempts eceeded
                    $error_message = $this->dx_auth->get_auth_error();
                }
            }
        } else {
            $error_message = $this->dx_auth->get_auth_error();
        }

        if (!empty($error_message)) {
            echo json_encode($error_message);
        }
    }


}