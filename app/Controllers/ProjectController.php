<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use DateTime;

class ProjectController extends BaseController
{
    /**
     * @throws \Exception
     */

    public function index(): string
    {
        $projectModel = new \App\Models\Project();
        $data['projects'] = $projectModel->getDataTables();
        return view('project/index', $data);
    }

    public function create(): string
    {
        return view('project/create');
    }

    /**
     * @throws \ReflectionException
     */
    public function store(): ResponseInterface
    {
        $validation = \Config\Services::validation();

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'daterange' => 'required',
            'status' => 'required',
            'role' => 'required',
            'responsibilities' => 'required',
            'technologies' => 'required',
            'team_size' => 'required|integer',
            'collaborators' => 'required',
            'repository_link' => 'permit_empty|valid_url',
            'live_demo_link' => 'permit_empty|valid_url',
            'documentation_link' => 'permit_empty|valid_url',
        ];

        if (!$validation->setRules($rules)->run($this->request->getPost())) {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['validation_errors' => $errors]);
        }

        $start_date = DateTime::createFromFormat('m/d/Y', explode(' - ', $this->request->getPost('daterange'))[0])->format('Y-m-d');
        $end_date = DateTime::createFromFormat('m/d/Y', explode(' - ', $this->request->getPost('daterange'))[1])->format('Y-m-d');

        $projectModel = new \App\Models\Project();
        $projectModel->save($this->getPostData());


        return redirect()->to('/project');
    }

    public function edit(int $id): string
    {
        $projectModel = new \App\Models\Project();
        $data['project'] = $projectModel->find($id);
        return view('project/edit', $data);
    }

    /**
     * @throws \ReflectionException
     */
    public function update(int $id): ResponseInterface
    {
        $validation = \Config\Services::validation();

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'daterange' => 'required',
            'status' => 'required',
            'role' => 'required',
            'responsibilities' => 'required',
            'technologies' => 'required',
            'team_size' => 'required|integer',
            'collaborators' => 'required',
            'repository_link' => 'permit_empty|valid_url',
            'live_demo_link' => 'permit_empty|valid_url',
            'documentation_link' => 'permit_empty|valid_url',
        ];

        if (!$validation->setRules($rules)->run($this->request->getPost())) {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['validation_errors' => $errors]);
        }

        $start_date = DateTime::createFromFormat('m/d/Y', explode(' - ', $this->request->getPost('daterange'))[0])->format('Y-m-d');
        $end_date = DateTime::createFromFormat('m/d/Y', explode(' - ', $this->request->getPost('daterange'))[1])->format('Y-m-d');

        $projectModel = new \App\Models\Project();
        $projectModel->update($id, $this->getPostData());

        return $this->response->setJSON(['success' => true]);
    }


    private function getPostData(): array
    {
        $start_date = DateTime::createFromFormat('m/d/Y', explode(' - ', $this->request->getPost('daterange'))[0])->format('Y-m-d');
        $end_date = DateTime::createFromFormat('m/d/Y', explode(' - ', $this->request->getPost('daterange'))[1])->format('Y-m-d');

        return [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => $this->request->getPost('status'),
            'role' => $this->request->getPost('role'),
            'responsibilities' => $this->request->getPost('responsibilities'),
            'technologies' => $this->request->getPost('technologies'),
            'team_size' => $this->request->getPost('team_size'),
            'collaborators' => $this->request->getPost('collaborators'),
            'repository_link' => $this->request->getPost('repository_link'),
            'live_demo_link' => $this->request->getPost('live_demo_link'),
            'documentation_link' => $this->request->getPost('documentation_link'),
            'created_at' => date('Y-m-d H:i:s'),
        ];
    }

    public function destroy(int $id)
    {
        $projectModel = new \App\Models\Project();
        $projectModel->delete($id);
        return $this->response->setJSON(['success' => true, 'message' => 'Project deleted successfully']);
    }


}
