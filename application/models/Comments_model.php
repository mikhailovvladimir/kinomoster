<?php

class Comments_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_comments($movie_id, $limit)
    {
        $query = $this->db
            ->where('movie_id', $movie_id)
            ->limit($limit)
            ->get('comments');

        return $query->result_array();
    }

    public function add_comments($movie_id)
    {
        $comment_columns = [
            'user_id' => $this->dx_auth->get_user_id(),
            'movie_id' => $movie_id,
            'comment_text' => $this->input->post('comment-text')
        ];

        return $this->db->insert('comments', $comment_columns);
    }
}