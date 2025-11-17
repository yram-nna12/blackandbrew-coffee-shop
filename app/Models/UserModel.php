<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // Table associated with this model
    protected $table      = 'users';

    // Primary key for the table
    protected $primaryKey = 'id';

    // Enable auto-increment for the primary key
    protected $useAutoIncrement = true;

    // Fields allowed to be mass-assigned during insert/update
    protected $allowedFields = [
        'first_name', 'last_name', 'username', 'email', 'phone', 'password', 'role', 'created_at', 'updated_at'
    ];

    // Enable automatic timestamp management (handles created_at & updated_at)
    protected $useTimestamps = true;

    // Database column used for storing creation timestamp
    protected $createdField  = 'created_at';

    // Database column used for storing last update timestamp
    protected $updatedField  = 'updated_at';
}
