<?php

namespace Timetables\Repositories;

use Timetables\Database\DB;
use Timetables\Entities\Subject;
use Timetables\Entities\User;

class SubjectsRepository extends Repository
{

    protected $table = 'subjects';

    public function __construct(DB $db)
    {
        parent::__construct($db);
    }

    public function findByUser(User $user)
    {
      $sql = 'SELECT subjects.* FROM subjects
        JOIN semester_subject ON semester_subject.subject_id = subjects.id
        JOIN semesters ON semester_subject.semester_id = semesters.id
        JOIN plans ON plans.id = semesters.plan_id
        JOIN programs ON programs.id = plans.program_id
        JOIN users ON users.id = programs.responsible_id AND users.id = :responsible_id';
      $subjects = $this->db->query($sql,
          [
              'responsible_id' => $user->id
          ]
      );
      return collect($subjects)->mapInto(Subject::class);
    }
    
};