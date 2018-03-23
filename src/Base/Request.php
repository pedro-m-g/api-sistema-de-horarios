<?php

namespace Timetables\Base;

class Request
{

  private $path;
  private $method;
  private $get;
  private $post;

  public function __construct($path = '/', $method = 'GET', $get = [], $post = [])
  {
    $this->path = $path;
    $this->method = $method;
    $this->get = $get;
    $this->post = $post;
  }

  public static function getInstance()
  {
    $url = $_SERVER['REQUEST_URI'];
    $path = parse_url($url, PHP_URL_PATH);
    return new Request($path, $_SERVER['REQUEST_METHOD'], $_GET, $_POST);
  }

  public function getPath()
  {
    return $this->path;
  }

  public function getMethod()
  {
    return $this->method;
  }

  public function get($key)
  {
    return $this->get[$key];
  }

  public function post($key)
  {
    return $this->post[$key];
  }

}