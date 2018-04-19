<?php

namespace Timetables\Base;

trait ReposContainer
{

    protected $repos = [];

    protected function loadRepositories($file, $app)
    {
        $repos = require($file);
        foreach ($repos as $name => $repo) {
            $this->repos[$name] = new $repo($app->db);
        }
    }

    public function repository($name)
    {
        return $this->repos[$name];
    }

}