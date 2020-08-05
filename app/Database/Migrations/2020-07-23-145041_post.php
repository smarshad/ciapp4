<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Post extends Migration
{
	public function up() {
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 50,
				'auto_increment'=> TRUE,
				'unsigned' => TRUE
			],
			'title' =>[
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => FALSE,
			],
			'content' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'thumbnail'=>[
				'type' => 'VARCHAR',
				'constraint'=>255,
				'null' => FALSE,
			],
			'category_id' =>[
				'type' => 'INT',
				'constraint' =>9,
				'null'=> FALSE,
			],
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
		$this->forge->createTable('posts',TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('posts',TRUE);
	}
	
}
