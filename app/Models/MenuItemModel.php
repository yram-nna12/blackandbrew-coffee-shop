<?php namespace App\Models;

use CodeIgniter\Model;

class MenuItemModel extends Model
{
    // Database table used by this model
    protected $table      = 'menu_items';

    // Primary key column of the table
    protected $primaryKey = 'id';

    // Fields that are allowed to be inserted/updated
    protected $allowedFields = [
        'name', 'description', 'price', 'image', 'category', 'created_at', 'updated_at'
    ];

    // Enable automatic handling of created_at and updated_at fields
    protected $useTimestamps = true;

    // Column name for "created at" timestamp
    protected $createdField  = 'created_at';

    // Column name for "updated at" timestamp
    protected $updatedField  = 'updated_at';
}
