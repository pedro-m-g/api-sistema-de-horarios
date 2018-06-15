<?php

namespace Timetables\Entities;

class Academic extends Entity
{

    protected $attrs = [
        'id',
        'name',
        'last_name_father',
        'last_name_mother',
        'employee_num',
        'is_active'
    ];

    public function __construct($data)
    {
        parent::__construt($data);
    }

}