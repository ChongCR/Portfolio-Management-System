<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectReference extends Model
{
    protected $table = 'project_reference';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['project_id', 'reference_id'];


}
