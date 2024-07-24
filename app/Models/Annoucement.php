<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class Annoucement
 * @package App\Models
 * @property int $id
 * @property string $title
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */

class Annoucement extends Model
{
    protected $table            = 'annoucements';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields = ['title','status'];

}
