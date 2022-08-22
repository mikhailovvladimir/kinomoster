<?php
if (!function_exists('isSiteAvailible')) {

    function isSiteAvailible($url)
    {
        $headers = get_headers($url);
        $code = substr($headers[0], 9, 3);
        if (is_numeric($code) and $code == 200) {
            return true;
        }

        return false;
    }
}