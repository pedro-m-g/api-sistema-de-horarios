<?php

namespace Timetables\Database;

use PDO;
use Timetables\Exception\DatabaseException;

class DB
{

    private $connection;

    public function __construct($server, $user, $password, $database)
    {
      try {
        $this->connection = new PDO(
          "mysql:host=$server;dbname=$database",
          $user,
          $password
        );
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        throw new DatabaseException($e->getMessage());
      }
    }
  
    public function query($sql, $bindings = [], $fetch = true)
    {
      try {
        $statement = $this->connection->prepare($sql);
        foreach ($bindings as $key => $value) {
          $statement->bindParam($key, $value);
        }
        $statement->execute();
        if ($fetch) {
          $statement->setFetchMode(PDO::FETCH_ASSOC);
          return $statement->fetchAll();
        }
      } catch (PDOException $e) {
        throw new DatabaseException($e->getMessage());
      }
    }
  
    public static function load($file)
    {
      $settings = require_once($file);
      return new DB(
        $settings['server'],
        $settings['user'],
        $settings['password'],
        $settings['db_name']
      );
    }  

}