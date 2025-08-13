<?php

if (!function_exists('formatViewCount')) {
    function formatViewCount($count) {
        if ($count >= 1000000) {
            return round($count / 1000000, 1) . 'M';
        }
        if ($count >= 1000) {
            return round($count / 1000, 1) . 'K';
        }
        return $count;
    }
}