<?php

namespace App\Classes;

class ServiceWorker
{
    // This function will return a random
    // string of specified length
    public function random_strings($length_of_string)
    {

        // String of all alphanumeric character
        // $str_result = '0123456789abcdefghijklmnopqrstuvwxyz0123456789';
        $str_result = '0123456789';

        // Shufle the $str_result and returns substring
        // of specified length
        $id = substr(str_shuffle($str_result),
            0, $length_of_string);

        if(1 === preg_match('~[0-9]~', $id) && 1 === preg_match('~[a-z]~', $id)){
            return $id;
        } else {
            return substr(str_shuffle($str_result),
                0, $length_of_string);
        }
    }
}
