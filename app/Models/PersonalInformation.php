<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class PersonalInformation
 * @package App\Models
 * @property int $id
 * @property string $profile_image_path
 * @property string $name
 * @property string $description
 */

class PersonalInformation extends Model
{
    protected $table            = 'personal_information';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['profile_image_path', 'name', 'description'];


}
