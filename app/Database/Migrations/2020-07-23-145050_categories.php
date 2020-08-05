<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 50,
				'auto_increment'=> TRUE
			],
			'category' =>[
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => FALSE,
			],
			'description' => ['type' => 'TEXT', 'null' => false],
			'created_at'  => [
				'type'    => 'DATETIME',
			     null	  => true,
				'default' => null,
			],
			'updated_at'   => [
				'type'    => 'DATETIME',
			    null	  => true,
				'default' => null,
			],
			'deleted_at'  => [
				'type'    => 'DATETIME',
				 null	  => true,
				'default' => null,
			]
		]);

		$this->forge->addKey('id',TRUE);
		$this->forge->createTable('categories',TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('categories',TRUE);
	}
}
