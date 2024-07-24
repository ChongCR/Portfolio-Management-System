<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateActivityLoggerTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'module' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'method' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'activity' => [
                'type' => 'TEXT',
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('activity_logger');
    }

    public function down()
    {
        $this->forge->dropTable('activity_logger');
    }
}
