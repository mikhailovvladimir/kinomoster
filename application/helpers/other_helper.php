<?php

if (!function_exists('show_active_menu')) {
    function show_active_menu($slug) {
        $ci =& get_instance();
        $result = "";

        if ($ci->uri->segment(1, 0) === $slug) {
            $result = 'class="active"';
        }

        if ($ci->uri->segment(3, 0) === $slug && $slug !== 0) {
            $result = 'class="active"';
        }

        if ($slug === 'films' && $ci->uri->segment(1,0) === 'movies' && $ci->uri->segment(2, 0) === 'view') {
            $result = 'class="active"';
        }
        

        return $result;
    }
}

if (!function_exists('get_user_name_by_id')) {
    function get_user_name_by_id($user_id) {
        $ci =& get_instance();
        $ci->load->model('dx_auth/users');
        $query = $ci->users->get_user_by_id($user_id);
        return $query->row();
    }
}

if (!function_exists('get_pagination_config')) {
    function get_pagination_config($count_entity, $count_entity_on_page, $url) {
        return [
            'base_url' => $url,
            'total_rows' => $count_entity ?? 0,
            'per_page' => $count_entity_on_page,
            'full_tag_open' => "<ul class='pagination'>",
            'full_tag_close' => "</ul>",
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'cur_tag_open' => "<li class='disabled'><li class='active'><a href='#'>",
            'cur_tag_close' => "<span class='sr-only'></span></a></li>",
            'next_tag_open' => "<li>",
            'next_tagl_close' => "</li>",
            'prev_tag_open' => "<li>",
            'prev_tagl_close' => "</li>",
            'first_tag_open' => "<li>",
            'first_tagl_close' => "</li>",
            'last_tag_open' => "<li>",
            'last_tagl_close' => "</li>"
        ];
    }
}