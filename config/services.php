<?php

use Timetables\Database\DB;
use Timetables\Auth\Authenticator;

return [
    'db' => DB::load(__DIR__ . '/db.php'),
    'auth' => new Authenticator()
];