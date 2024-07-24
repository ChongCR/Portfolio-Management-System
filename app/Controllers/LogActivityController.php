<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ActivityLogger;
use CodeIgniter\HTTP\ResponseInterface;


class LogActivityController extends BaseController
{
    public function index()
    {
        $projectModel = new \App\Models\ActivityLogger();
        $data['logs'] = $projectModel->findAll();
        return view('logs/index', $data);
    }
}