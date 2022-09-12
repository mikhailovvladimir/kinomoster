<?php


class Feedback_model extends CI_Model
{
    public function sendFeedback()
    {
        $feedbackFields = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'text' => $this->input->post('text')
        ];

        $this->db->insert('feedback', $feedbackFields);
    }
}