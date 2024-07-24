<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePersonalInformationTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'profile_image_path' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('personal_information');

    }

    public function down()
    {
        $this->forge->dropTable('personal_information');
    }
}
