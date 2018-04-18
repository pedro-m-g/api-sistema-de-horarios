<?php

namespace Timetables\Base;

trait ServiceContainer
{

    protected $services = [];

    public function __set($name, $value)
    {
        $this->services[$name] = $value;
    }

    public function __get($name)
    {
        return $this->services[$name];
    }

    protected function load($config) {
        $services = require($config);
        foreach ($services as $name => $service) {
            $this->services[$name] = $service;
        }
    }

}