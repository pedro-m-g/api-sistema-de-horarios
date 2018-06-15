<?php

use Timetables\Repositories\AcademicsRepository;
use Timetables\Repositories\ProgramsRepository;
use Timetables\Repositories\UsersRepository;

return [
    'academics' => AcademicsRepository::class,
    'programs' => ProgramsRepository::class,
    'users' => UsersRepository::class
];