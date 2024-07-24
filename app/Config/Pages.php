<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pages extends BaseConfig
{
    public $globalCSS = [
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css',
        'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css',
        'https://unpkg.com/@yaireo/tagify/dist/tagify.css',
        'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/css/fileinput.min.css',
    ];
    public $globalJS = [
        'https://code.jquery.com/jquery-3.5.1.min.js',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',
        'https://cdn.jsdelivr.net/jquery/latest/jquery.min.js',
        'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js',
        'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js',
        'https://unpkg.com/@yaireo/tagify',
        'https://unpkg.com/sweetalert/dist/sweetalert.min.js',
        'https://cdn.jsdelivr.net/npm/sweetalert2@11',
        'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/fileinput.min.js',
    ];

    public $specific = [
        'home' => [
            'css' => [],
            'js' => [],
        ],
    ];
}