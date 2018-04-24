<?php

namespace Timetables\Base;

class Request
{

  private $path;
  private $method;
  private $get;
  private $post;
  private $json;
  private $headers;

  public function __construct($path = '/', $method = 'GET', $get = [], $post = [], $headers = [], $json = [])
  {
    $this->path = $path;
    $this->method = $method;
    $this->get = $get;
    $this->post = $post;
    $this->json = $json;
    $this->headers = $headers;
  }

  public static function getInstance()
  {
    $url = $_SERVER['REQUEST_URI'];
    $path = parse_url($url, PHP_URL_PATH);
    $json = json_decode(file_get_contents('php://input'), true);
    if (is_null($json)) {
      $json = [];
    }
    return new Request($path, $_SERVER['REQUEST_METHOD'], $_GET, $_POST, getallheaders(), $json);
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
    return array_key_exists($key, $this->get) ? $this->get[$key] : null;
  }

  public function post($key)
  {
    return array_key_exists($key, $this->post) ? $this->post[$key] : null;
  }

  public function header($header)
  {
    return array_key_exists($header, $this->headers) ? $this->headers[$header] : null;
  }

  public function json($field)
  {
    return array_key_exists($field, $this->json) ? $this->json[$field] : null;
  }

}