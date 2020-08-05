<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'         => [
				'type'       	 => 'INT',
				'constraint' 	 => 9,
				'auto_increment' => true
			],
			'email' => [
				'type'       => 'VARCHAR',
				'constraint' => 50,
				'null'       => false
			],
			'username' => [
				'type'       => 'VARCHAR',
				'constraint' => 50,
				'null'       => false
			],
			'password' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => false
			],'gender' => [
				'type'       => 'VARCHAR',
				'constraint' => 5,
				'null'       => true
			],
			'status'      => [
                'type'           => 'ENUM',
                'constraint'     => ['active', 'inactive'],
                'default'        => 'inactive',
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
		$this->forge->addKey('id', true);
		$this->forge->createTable('users', true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users', true);
	}
}
