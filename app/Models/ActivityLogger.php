<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityLogger extends Model
{
    protected $table = 'activity_logger';
    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'module', 'method', 'activity', 'created_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';

    public function logActivity(string $username, string $module, string $method, string $activity): void
    {
        $this->save([
            'username' => $username,
            'module' => $module,
            'method' => $method,
            'activity' => $activity,
        ]);
    }
}
