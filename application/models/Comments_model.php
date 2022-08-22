<?php

class Comments_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getComments($movie_id, $limit)
    {
        $query = $this->db
            ->where('movie_id', $movie_id)
            ->limit($limit)
            ->get('comments');

        return $query->result_array();
    }

    public function addComment($movieId)
    {
        $commentColumns = [
            'user_id' => $this->dx_auth->get_user_id(),
            'movie_id' => $movieId,
            'comment_text' => $this->input->post('comment-text')
        ];

        return $this->db->insert('comments', $commentColumns);
    }
}