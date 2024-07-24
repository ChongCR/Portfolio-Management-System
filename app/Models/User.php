<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class User
 * @package App\Models
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $created_at
 */


class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['username', 'password', 'email'];
}

