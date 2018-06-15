<?php

namespace Timetables\Repositories;

use Timetables\Database\DB;
use Timetables\Entities\Program;
use Timetables\Entities\User;

class ProgramsRepository extends Repository
{

    protected $table = 'programs';

    public function __construct(DB $db)
    {
        parent::__construct($db);
    }

    public function findByUser(User $user)
    {
      $sql = 'SELECT programs.* FROM programs JOIN users ON users.id = programs.responsible_id AND users.id = :responsible_id';
      $programs = $this->db->query($sql,
          [
              'responsible_id' => $user->id
          ]
      );
      return collect($programs)->mapInto(Program::class);
    }
    
};