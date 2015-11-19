<?php
if ( ! function_exists('is_debug'))
{
    function is_debug()
    {
        return env('APP_DEBUG');
    }
} else dd('function is_debug exists.' . __FILE__ . ':' . __LINE__);