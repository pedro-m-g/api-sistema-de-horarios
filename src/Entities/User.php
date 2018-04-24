<?php

namespace Timetables\Entities;

class User extends Entity
{

    protected $attrs = [
        'id',
        'name',
        'last_name_father',
        'last_name_mother',
        'email',
        'password',
        'token',
        'role_id'
    ];

    protected $hidden = [
        'password'
    ];

    public function __construct($data)
    {
        parent::__construt($data);
    }

    public function checkPassword($password)
    {
        return password_verify($password, $this->password);
    }

}