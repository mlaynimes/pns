<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists())
{
    function subject_names_to_links($str, $url = null) {
        $domain = is_null($url) ? '/' : $url;
        $str_arr = explode('||', $str);
        $links_arr = array_map(function ($subject) use ($str_arr, $domain) {
            $subject = trim($subject);
            $subject_arr = explode('.', $subject);
            $subject_link = sprintf("<a href=%s?id=\"%s\">%s</a>", $domain, $subject_arr[0], $subject_arr[1]);
            return $subject_link;
        }, $str_arr);
        return implode(' || ', $links_arr);
    }
}