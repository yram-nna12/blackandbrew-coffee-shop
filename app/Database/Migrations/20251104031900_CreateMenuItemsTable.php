<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuItemsTable extends Migration
{
    public function up()
    {
        // Define the structure/fields of the 'menu_items' table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true // Auto-increment primary key
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150' // Menu item name, max 150 characters
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true // Optional description of the menu item
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2' // Price with 2 decimal places
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255', // Path or filename of the image
                'null'       => true   // Image is optional
            ],
            'category' => [ // Category of the menu item (e.g., drinks, main dish)
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true // Timestamp when record is created
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true // Timestamp when record is last updated
            ],
        ]);

        // Set 'id' as primary key
        $this->forge->addKey('id', true);

        // Create the 'menu_items' table if it does not already exist
        $this->forge->createTable('menu_items', true);
    }

    public function down()
    {
        // Drop the 'menu_items' table if it exists (for rollback)
        $this->forge->dropTable('menu_items', true);
    }
}
