<?php

namespace Timetables\Entities;

class Entity
{

    protected $attrs;
    protected $hidden;

    private $data;

    public function __construt($data)
    {
        $this->data = $data;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function toArray()
    {
        $data = [];
        foreach ($this->data as $key => $value) {
            if (!in_array($key, $this->hidden)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }

    public function getAttrs()
    {
        return $this->attrs;
    }

}