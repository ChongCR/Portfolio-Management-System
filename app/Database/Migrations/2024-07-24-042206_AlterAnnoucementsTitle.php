<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterAnnoucementsTitle extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('annoucements', [
            'title' => [
                'name' => 'title',
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('annoucements', [
            'title' => [
                'name' => 'title',
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
    }
}
