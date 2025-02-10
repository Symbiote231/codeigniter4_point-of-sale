<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'name', 'email', 'created_at'];
    protected $useTimestamps = true;
    private $myLogger;

    public function __construct()
    {
        parent::__construct(); // This ensures the Model class's constructor is called ensuring automatic DB connection
        $this->myLogger = service('logger'); // Initialize logger here
    }

    // Validate connection to DB is successful
    public function isConnected(): bool
    {
        try {
            // Simple query to check database connection
            $this->db->query('SELECT 1');
            log_message('debug', 'Database connection succeeded');
            $this->myLogger->debug('Database connection succeeded');
            return true;
        } catch (\Exception $e) {
            log_message('error', 'Database connection failed: ' . $e->getMessage());
            $this->myLogger->error('Database connection failed: ' . $e->getMessage());
            return false;
        }
    }

    // Fetch user data from database
    public function getUser(string $username)
    {
        return $this->where('username', $username)->first();
    }
}
