<?php

namespace Timetables\Repositories;

use Timetables\Database\DB;
use Timetables\Entities\Academic;
use Timetables\Entities\User;

class AcademicsRepository extends Repository
{

    protected $table = 'academics';

    public function __construct(DB $db)
    {
        parent::__construct($db);
    }

    public function findByUser(User $user)
    {
      $sql = 'SELECT academics.*, programs.name AS program FROM academics
        JOIN academic_program ON academic_program.academics_id = academics.id
        JOIN programs ON programs.id = academic_program.programs_id
        JOIN users ON users.id = programs.responsible_id AND users.id = :responsible_id';
      $academics = $this->db->query($sql,
          [
              'responsible_id' => $user->id
          ]
      );
      return collect($academics)->mapInto(Academic::class);
    }
    
};