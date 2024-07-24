<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AnnoucementController extends BaseController
{
    public function index(): string
    {
        $annoucementModel = new \App\Models\Annoucement();
        $data['annoucements'] = $annoucementModel->findAll();
        return view('annoucement/index', $data);
    }

    public function create(): string
    {
        return view('annoucement/create');
    }

    public function store(): ResponseInterface
    {
        $validation = \Config\Services::validation();

        $rules = [
            'title' => 'required',
            'status' => 'permit_empty',
        ];

        if (!$validation->setRules($rules)->run($this->request->getPost())) {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['validation_errors' => $errors]);
        }

        $postData = $this->request->getPost();
        $postData['status'] = $this->request->getPost('status') === 'on' ? 1 : 0;

        $annoucementModel = new \App\Models\Annoucement();

        $activeannoucements = $annoucementModel->where('status', 1)->findAll();

        if ($postData['status'] == 1 && !empty($activeannoucements)) {
            return $this->response->setJSON(['error' => 'There is already an active annoucement, please deactivate it first.']);
        }

        $annoucementModel->save($postData);

        // Add activity log
        $activityLogger = new \App\Models\ActivityLogger();
        $activityLogger->logActivity(session()->get('username'),
            'Annoucement',
            'Create',
            'Create new annoucement: ' . $this->request->getPost('title'));

        return redirect()->to('/annoucement');
    }

    public function edit(int $id): string
    {
        $annoucementModel = new \App\Models\Annoucement();
        $data['annoucement'] = $annoucementModel->find($id);
        return view('annoucement/edit', $data);
    }

    public function update(int $id): ResponseInterface
    {
        $validation = \Config\Services::validation();

        $rules = [
            'title' => 'required',
            'status' => 'permit_empty',
        ];

        if (!$validation->setRules($rules)->run($this->request->getPost())) {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['validation_errors' => $errors]);
        }

        $postData = [
            'title' => $this->request->getPost('title'),
            'status' => $this->request->getPost('status') === 'on' ? 1 : 0,
        ];

        $annoucementModel = new \App\Models\Annoucement();

        if ($postData['status'] == 1) {
            $activeAnnouncements = $annoucementModel->where('status', 1)->where('id !=', $id)->findAll();

            if (!empty($activeAnnouncements)) {
                return $this->response->setJSON(['error' => 'Only one announcement can be active at a time.']);
            }
        }

        $annoucementModel->update($id, $postData);

        // Add activity log
        $activityLogger = new \App\Models\ActivityLogger();
        $activityLogger->logActivity(session()->get('username'),
            'Annoucement',
            'Update',
            'Update annoucement with ID: ' . $id);

        return redirect()->to('/annoucement');
    }

}
