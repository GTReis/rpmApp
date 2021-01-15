<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUser extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'user_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
				'auto_increment' => true
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 200
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 80
			],
			'fone' => [
				'type' => 'VARCHAR',
				'constraint' => 16
			],
			'address' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => true
			],
			'user_rg' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
				'null' => true
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);
		$this->forge->addKey('user_id', true);
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
