<?php

class Search_model extends CI_Model
{
    public function search($q)
    {
        $array_search = array(
            'name' => $q,
            'descriptions' => $q
        );


        $query = $this->db
            ->or_like($array_search)
            ->limit(100)
            ->get('movie');

        return $query->result_array();
    }
}