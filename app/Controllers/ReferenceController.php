<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ReferenceController extends BaseController
{

    public function index()
    {
        $referenceModel = new \App\Models\Reference();
        $data['references'] = $referenceModel->findAll();
        return view('reference/index', $data);
    }

    public function create()
    {
        return view('reference/create');
    }

    public function store()
    {
        //validation only unique email
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'relationship' => 'required',
            'email' => [
                'rules' => 'required|valid_email|is_unique[references.email]',
                'errors' => [
                    'is_unique' => 'Email already existed, please check again.'
                ]
            ],
            'phone' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if (!$isDataValid) {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['validation_errors' => $errors]);
        }

        $referenceModel = new \App\Models\Reference();
        $referenceModel->save([
            'name' => $this->request->getPost('name'),
            'relationship' => $this->request->getPost('relationship'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
        ]);

        // Add activity log
        $activityLogger = new \App\Models\ActivityLogger();
        $activityLogger->logActivity(session()->get('username'), 'Reference', 'Store', 'Create new reference: '.$this->request->getPost('name'));

        return redirect()->to('/reference');
    }
    public function edit($id)
    {
        $referenceModel = new \App\Models\Reference();
        $data['reference'] = $referenceModel->find($id);
        return view('reference/edit', $data);
    }

    public function update($id)
    {
        //validation only unique email
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'relationship' => 'required',
            'email' => [
                'rules' => 'required|valid_email|is_unique[references.email,id,' . $id . ']',
                'errors' => [
                    'is_unique' => 'This email already exists.'
                ]
            ],
            'phone' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if (!$isDataValid) {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['validation_errors' => $errors]);
        }

        $referenceModel = new \App\Models\Reference();
        $referenceModel->update($id, [
            'name' => $this->request->getPost('name'),
            'relationship' => $this->request->getPost('relationship'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
        ]);

        // Add activity log
        $activityLogger = new \App\Models\ActivityLogger();
        $activityLogger->logActivity(session()->get('username'), 'Reference', 'Update', 'Update reference with ID: ' . $id);


        return redirect()->to('/reference');
    }

    public function destroy($id)
    {
        $referenceModel = new \App\Models\Reference();
        $referenceModel->delete($id);

        // Add activity log
        $activityLogger = new \App\Models\ActivityLogger();
        $activityLogger->logActivity(session()->get('username'), 'Reference', 'Delete', 'Deleted reference with ID: ' . $id);

        return $this->response->setJSON(['success' => true, 'message' => 'Reference deleted successfully']);
    }

}
