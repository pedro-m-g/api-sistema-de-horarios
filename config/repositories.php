<?php

use Timetables\Repositories\AcademicsRepository;
use Timetables\Repositories\ProgramsRepository;
use Timetables\Repositories\SubjectsRepository;
use Timetables\Repositories\UsersRepository;

return [
    'academics' => AcademicsRepository::class,
    'programs' => ProgramsRepository::class,
    'subjects' => SubjectsRepository::class,
    'users' => UsersRepository::class
];