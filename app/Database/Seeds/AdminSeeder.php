<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Hash the default admin password using PHP's default algorithm
        $password = password_hash('Admin123!', PASSWORD_DEFAULT);

        // Prepare admin user data to be inserted into the 'users' table
        $data = [
            'first_name' => 'Black',                          // Admin first name
            'last_name'  => 'Brew',                           // Admin last name
            'email'      => 'admin@coffee.test',              // Admin login email
            'password'   => $password,                        // Hashed password
            'role'       => 'admin',                          // Set user role as admin
            'created_at' => date('Y-m-d H:i:s'),              // Current timestamp for creation
            'updated_at' => date('Y-m-d H:i:s'),              // Current timestamp for last update
        ];

        // Insert the admin user into the 'users' table
        $this->db->table('users')->insert($data);
    }
}
