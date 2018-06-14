<?php

namespace Timetables\Entities;

class Program extends Entity
{

    protected $attrs = [
        'id',
        'name',
        'responsible_id'
    ];

    protected $hidden = [
        'password'
    ];

    public function __construct($data)
    {
        parent::__construt($data);
    }

}