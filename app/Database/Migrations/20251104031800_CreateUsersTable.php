<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        // Check if the 'users' table already exists
        $tableExists = $this->db->query("SHOW TABLES LIKE 'users'")->getNumRows() > 0;

        // Only create the table if it does not exist
        if (!$tableExists) {
            // Define the fields/columns for the 'users' table
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true, // Auto-increment primary key
                ],
                'first_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100', // Max length 100 characters
                ],
                'last_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100', // Max length 100 characters
                ],
                'email' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '150', // Max length 150 characters
                    'unique'     => true,  // No duplicate emails allowed
                ],
                'password' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255', // Stores hashed password
                ],
                'role' => [
                    'type'       => 'ENUM',
                    'constraint' => ['admin', 'customer'], // Allowed roles
                    'default'    => 'customer', // Default role
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => true, // Can be null (handled by application)
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'null' => true, // Can be null (handled by application)
                ],
            ]);

            // Set 'id' as the primary key
            $this->forge->addKey('id', true);

            // Create the 'users' table with the defined structure
            $this->forge->createTable('users');
        }
    }

    public function down()
    {
        // Check if the 'users' table exists before attempting to drop it
        $tableExists = $this->db->query("SHOW TABLES LIKE 'users'")->getNumRows() > 0;

        // Drop the 'users' table only if it exists
        if ($tableExists) {
            $this->forge->dropTable('users');
        }
    }
}
