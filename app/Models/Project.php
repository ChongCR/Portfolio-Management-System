<?php

namespace App\Models;

use CodeIgniter\Model;
use Yajra\DataTables\DataTables;

/**
 * Class Project
 * @package App\Models
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property string $status
 * @property string $role
 * @property string $responsibilities
 * @property string $technologies
 * @property int $team_size
 * @property string $collaborators
 * @property string $repository_link
 * @property string $live_demo_link
 * @property string $documentation_link
 * @property string $created_at
 * @property string $updated_at
 *
 */
class Project extends Model
{
    protected $table            = 'projects';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
        'role',
        'responsibilities',
        'technologies',
        'team_size',
        'collaborators',
        'repository_link',
        'live_demo_link',
        'documentation_link',
        'created_at',
    ];



    public function getDataTables()
    {
        $query = $this->db->table('projects')->get();

        $data = [];
        foreach ($query->getResult() as $row)
        {
            $data[] = [
                'id' => $row->id,
                'title' => $row->title,
                'description' => $row->description,
                'status' => $row->status,
                'team_size' => $row->team_size,
                'repository_link' => $row->repository_link,
                'live_demo_link' => $row->live_demo_link,
                'documentation_link' => $row->documentation_link,
                'created_at' => $row->created_at,
            ];
        }

        return json_encode(['data' => $data]);
    }

}
