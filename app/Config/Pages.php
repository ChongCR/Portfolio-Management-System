<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pages extends BaseConfig
{
    public $globalCSS = [
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
    ];

    public $globalJS = [];

    public $specific = [
        'home' => [
            'css' => [],
            'js' => [],
        ],
    ];
}