<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Project;
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
        $referenceModel = new \App\Models\Reference();
        $data['references'] = $referenceModel->findAll();
        return view('project/create', $data);
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

        $projectId = $projectModel->insertID();

        $projectReferenceModel = new \App\Models\ProjectReference();
        foreach ($this->request->getPost('references') as $referenceId) {
            $projectReferenceModel->save([
                'project_id' => $projectId,
                'reference_id' => $referenceId
            ]);
        }

        // Add activity log
        $activityLogger = new \App\Models\ActivityLogger();
        $activityLogger->logActivity(session()->get('username'), 'Project', 'Create', 'Created a new project with ID: ' . $projectId);

        return redirect()->to('/project');
    }

    public function edit(int $id): string
    {
        $projectModel = new \App\Models\Project();
        $data['project'] = $projectModel->find($id);

        $referenceModel = new \App\Models\Reference();
        $data['references'] = $referenceModel->findAll();

        $projectReferenceModel = new \App\Models\ProjectReference();
        $data['selectedReferences'] = $projectReferenceModel->where('project_id', $id)->findAll();

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

        $projectReferenceModel = new \App\Models\ProjectReference();
        $projectReferenceModel->where('project_id', $id)->delete();

        foreach ($this->request->getPost('references') as $referenceId) {
            $projectReferenceModel->save([
                'project_id' => $id,
                'reference_id' => $referenceId
            ]);
        }
        // Add activity log
        $activityLogger = new \App\Models\ActivityLogger();
        $activityLogger->logActivity(session()->get('username'), 'Project', 'Update', 'Updated project with ID: ' . $id);

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
        $projectReferenceModel = new \App\Models\ProjectReference();
        $projectReferenceModel->where('project_id', $id)->delete();
        $projectModel->delete($id);

        // Add activity log
        $activityLogger = new \App\Models\ActivityLogger();
        $activityLogger->logActivity(session()->get('username'), 'Project', 'Delete', 'Deleted project with ID: ' . $id);

        return $this->response->setJSON(['success' => true, 'message' => 'Project and associated references deleted successfully']);
    }


}
