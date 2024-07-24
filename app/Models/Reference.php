<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class Reference
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $relationship
 * @property string $email
 * @property string $phone
 * @property string $created_at
 * @property string $updated_at
 */
class Reference extends Model
{
    protected $table            = 'references';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['name', 'relationship', 'email', 'phone', 'created_at', 'updated_at'];
}
