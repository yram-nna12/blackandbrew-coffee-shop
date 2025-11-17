<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCategoryToMenuItems extends Migration
{
    public function up()
    {
        // Check if the 'category' column already exists in the 'menu_items' table
        $columnExists = $this->db->query("SHOW COLUMNS FROM `menu_items` LIKE 'category'")->getNumRows() > 0;

        // Only add the column if it does not exist
        if (!$columnExists) {
            // Add a nullable VARCHAR(100) 'category' column to the 'menu_items' table
            $this->forge->addColumn('menu_items', [
                'category' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => true,
                ],
            ]);
        }
    }

    public function down()
    {
        // Check again if the 'category' column exists before attempting to drop it
        $columnExists = $this->db->query("SHOW COLUMNS FROM `menu_items` LIKE 'category'")->getNumRows() > 0;

        // Only drop the column if it currently exists
        if ($columnExists) {
            // Remove the 'category' column from the 'menu_items' table
            $this->forge->dropColumn('menu_items', 'category');
        }
    }
}
