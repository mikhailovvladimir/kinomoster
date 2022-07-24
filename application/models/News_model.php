<?php

class News_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getNews($slug = false)
    {
        // возвращает все записи из бд
        if ($slug === false) {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        // иначе по конкретному слагу
        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    public function setNews($slug, $title, $text) 
    {
        $data = array(
            'title' => $title,
            'slug' => $slug,
            'text' => $text
        );
        // сначала таблица, потом данные
        return $this->db->insert('news', $data);
    }

    public function updateNews($slug, $title, $text)
    {
        $data = array(
            'title' => $title,
            'slug' => $slug,
            'text' => $text
        );

        return $this->db->update('news', $data, array('slug' => $slug));
    }

    public function deleteNews($slug)
    {
        return $this->db->delete('news', array('slug' => $slug));
    }
}