<?php

namespace Timetables\Repositories;

use Timetables\Database\DB;
use Timetables\Entities\User;

class UsersRepository extends Repository
{

    protected $table = 'users';

    public function __construct(DB $db)
    {
        parent::__construct($db);
    }

    public function findByToken($token)
    {
        $users = $this->db->query(
            'SELECT users.*, roles.name AS role FROM users JOIN roles ON roles.id = users.role_id AND token = :token',
            [
                'token' => $token
            ]
        );
        if (empty($users)) {
            return null;
        }
        return new User($users[0]);
    }

    public function findByEmail($email)
    {
        $users = $this->db->query(
            'SELECT users.*, roles.name AS role FROM users JOIN roles ON roles.id = users.role_id AND email = :email',
            [
                'email' => $email
            ]
        );
        if (empty($users)) {
            return null;
        }
        return new User($users[0]);
    }
    
}