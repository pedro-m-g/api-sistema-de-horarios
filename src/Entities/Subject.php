<?php

namespace Timetables\Entities;

class Subject extends Entity
{

    protected $attrs = [
        'id',
        'name',
        'short_name',
        'key'
    ];

    public function __construct($data)
    {
        parent::__construt($data);
    }

}