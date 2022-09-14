<?php

class Films_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_films($slug = false, $limit, $type = 1) {
        if ($slug === false) {
            $query = $this->db
                ->where('category_id', $type)
                ->order_by('add_date', 'desc')
                ->limit($limit)
                ->get('movie');

            return $query->result_array();
        }

        $query = $this->db->get_where('movie', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_count_movies()
    {
        return $this->db->count_all('movie');
    }

    public function get_count_movies_by_category_id($categoryId)
    {
        if (isset($categoryId)) {
            return count(
                $this->db
                    ->where('category_id', $categoryId)
                    ->order_by('add_date', 'desc')
                    ->get('movie')
                    ->result_array()
            );
        }

        return false;
    }

    public function get_films_by_rating($limit)
    {
        $query = $this->db
            ->order_by('rating', 'desc')
            ->where('category_id', 1)
            ->where('rating >', 0)
            ->limit($limit)
            ->get('movie'); // из какой таблицы
        
        return $query->result_array();
    }

    public function get_movies_on_page($row_count, $offset, $type = 1) {
        $query = $this->db
        ->where('category_id', $type)
        ->order_by('add_date', 'desc')
        ->get('movie', $row_count, $offset);

        return $query->result_array();
    }

    public function get_movies_by_rating_on_page($row_count, $offset) {
        $query = $this->db
            ->order_by('rating', 'desc')
            ->get('movie', $row_count, $offset);

        return $query->result_array();
    }
}