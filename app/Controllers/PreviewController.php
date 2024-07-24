<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Annoucement;
use App\Models\Project;
use App\Models\ProjectReference;
use App\Models\Reference;
use CodeIgniter\HTTP\ResponseInterface;

class PreviewController extends BaseController
{
    public function index()
    {
        $annoucementModel = new Annoucement();
        $activeAnnouncement = $annoucementModel->where('status', 1)->first();

        $projectModel = new Project();
        $projects = $projectModel->findAll();

        $projectReferenceModel = new ProjectReference();
        $referenceModel = new Reference();
        foreach ($projects as &$project) {
            $projectReferences = $projectReferenceModel->where('project_id', $project['id'])->findAll();
            foreach ($projectReferences as &$projectReference) {
                $reference = $referenceModel->find($projectReference['reference_id']);
                $projectReference['name'] = $reference['name'];
                $projectReference['relationship'] = $reference['relationship'];
                $projectReference['email'] = $reference['email'];
                $projectReference['phone'] = $reference['phone'];
            }
            $project['references'] = $projectReferences;
        }

        return view('preview/index', ['announcement' => $activeAnnouncement, 'projects' => $projects]);
    }
}
