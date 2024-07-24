<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProjectReferencePivotTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'project_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'reference_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addForeignKey('project_id', 'projects', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('reference_id', 'references', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('project_reference');
    }

    public function down()
    {
        $this->forge->dropTable('project_reference');
    }
}
