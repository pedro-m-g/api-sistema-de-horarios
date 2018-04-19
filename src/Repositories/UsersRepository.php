<?php

namespace Timetables\Repositories;

use Timetables\Database\DB;

class UsersRepository extends Repository
{

    public function __construct(DB $db)
    {
        parent::__construct($db);
    }

    public function all()
    {
        return $this->select('users');
    }

    public function findByToken($token)
    {
        $users = $this->db->query(
            'SELECT * FROM users WHERE token = :token',
            [
                'token' => $token
            ]
        );
        if (empty($users)) {
            return null;
        }
        return $users[0];
    }
    
}