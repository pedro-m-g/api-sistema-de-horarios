<?php

namespace Timetables\Repositories;

use Timetables\Database\DB;

class Repository
{
    
    protected $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    protected function select($table, $vars = [], $fields = ['*'], $where = "")
    {
        $fields_query = implode(',', $fields);
        $where_claus = $where ? " WHERE $where" : "";
        return $this->db->query(
            "SELECT $fields_query FROM $table $where_claus",
            $vars);
    }

}