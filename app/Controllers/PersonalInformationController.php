<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PersonalInformationController extends BaseController
{
    public function index()
    {
        $personalInformationModel = new \App\Models\PersonalInformation();
        $personalInformations = $personalInformationModel->findAll();

        if (empty($personalInformations)) {
            return view('personal_information/index');
        } else {
            $data['personalInformation'] = $personalInformations[0];
            return view('personal_information/create', $data);
        }
    }

    public function store(): ResponseInterface
    {
        $validation = \Config\Services::validation();

        $personalInformationModel = new \App\Models\PersonalInformation();
        $personalInformations = $personalInformationModel->findAll();

        $rules = [
            'name' => 'required',
            'description' => 'permit_empty',
            'profile_image_path' => empty($personalInformations) ? 'uploaded[profile_image_path]' : 'permit_empty',
        ];

        if (!$validation->setRules($rules)->run($this->request->getPost())) {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['validation_errors' => $errors]);
        }

        $postData = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];

        $file = $this->request->getFile('profile_image_path');

        if ($file->isValid() && !$file->hasMoved()) {
            array_map('unlink', glob(FCPATH . 'uploads/profile_information/*'));

            $newName = $file->getRandomName();

            if (!is_dir(FCPATH . 'uploads/profile_information')) {
                mkdir(FCPATH . 'uploads/profile_information', 0777, true);
            }

            $file->move(FCPATH . 'uploads/profile_information', $newName);
            $postData['profile_image_path'] = $newName;
        } else if (!empty($personalInformations)) {
            $postData['profile_image_path'] = $personalInformations[0]['profile_image_path'];
        }

        $personalInformationModel = new \App\Models\PersonalInformation();

        $personalInformationModel->emptyTable();

        $personalInformationModel->save($postData);

        // Add activity log
        $activityLogger = new \App\Models\ActivityLogger();
        $activityLogger->logActivity(session()->get('username'),
            'Personal Information',
            'Update',
            'Update personal information: ' . $this->request->getPost('name'));

        return redirect()->to('/personal-information');
    }
}
