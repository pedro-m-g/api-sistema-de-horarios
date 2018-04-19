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
    
}