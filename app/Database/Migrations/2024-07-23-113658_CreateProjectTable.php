<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProjectTable extends Migration
{


    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'start_date' => [
                'type' => 'DATE',
            ],
            'end_date' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Ongoing', 'Completed', 'Planned'],
                'default' => 'Ongoing',
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'responsibilities' => [
                'type' => 'TEXT',
            ],
            'technologies' => [
                'type' => 'TEXT',
            ],
            'team_size' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'collaborators' => [
                'type' => 'TEXT',
            ],
            'repository_link' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'live_demo_link' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'documentation_link' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('projects');
    }

    public function down()
    {
        $this->forge->dropTable('projects');
    }
}
