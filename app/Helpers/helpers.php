<?php

use App\Models\SiteSetting;

if (!function_exists('site_setting')) {
    /**
     * Get a site setting value by key
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function site_setting(string $key, mixed $default = null): mixed
    {
        return SiteSetting::get($key, $default);
    }
}
