<?php

namespace Timetables\Repositories;

use Timetables\Database\DB;

class Repository
{
    
    protected $db;
    protected $table;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function create($entity)
    {
        $insert = [];
        foreach ($entoty->toArray() as $field => $value) {
            if ($field != 'id') {
                $insert[$field] = $value;
            }
        }
        $fields = array_keys($insert);
        $values = array_map(function($field) {
            return ":$field";
        }, $fields);
        $fields = implode(',', $fields);
        $values = implode(',', $values);
        $sql = "INSERT INTO {$this->table} ($fields) VALUES ($values)";
        $this->db->query($sql, $insert, false);
    }

    public function update($entity)
    {
        $sql = "UPDATE {$this->table} SET ";
        $vars = [];
        $updates = [];
        foreach ($entity->getAttrs() as $attr) {
            $vars[$attr] = $entity->$attr;
            if ($attr !== 'id') {
                $updates[] = "$attr = :$attr"; // Don't update IDs
            }
        }
        $sql .= implode(', ', $updates);
        $sql .= ' WHERE id = :id';
        $this->db->query($sql, $vars, false);
    }

    public function delete($entity)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $vars = [ 'id' => $entity->id ];
        $this->db->query($sql, $vars, false);
    }

}