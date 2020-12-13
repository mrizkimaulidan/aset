<?php

if (!function_exists('indonesian_date_format')) {
    function indonesian_date_format($date)
    {
        return date('d-m-Y', strtotime($date));
    }
}
