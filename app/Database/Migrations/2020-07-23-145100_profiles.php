<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profiles extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 9,
				'auto_increment' => TRUE,
				'unsigned' => TRUE,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => 9,
				'null' => FALSE,
			],
			'first_name' => [
				'type'       => 'VARCHAR',
				'constraint' => 100,
				'null'       => true
			],
			'last_name' => [
				'type'       => 'VARCHAR',
				'constraint' => 100,
				'null'       => true
			],
		    'address' => ['type' => 'TEXT', 'null' => true],
		    'country' => ['type' => 'VARCHAR','constraint'=>25 ,'null' => true],
		    'state' => ['type' => 'VARCHAR','constraint'=>25 ,'null' => true],
		    'city' => ['type' => 'VARCHAR','constraint'=>25 ,'null' => true],
		    'zipcode' => ['type' => 'INT','constraint'=>6 ,'null' => true],
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

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('profiles', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('profiles', TRUE);
	}
}
