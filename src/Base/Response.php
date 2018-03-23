<?php

namespace Timetables\Base;

class Response
{

  private $content;
  private $code;
  private $headers;

  public function __construct($content = '', $code = 200, $headers = []) {
    $this->content = $content;
    $this->code = $code;
    $this->headers = $headers;
  }

  public function send()
  {
    http_response_code($this->code);
    foreach ($this->headers as $header => $content) {
      header("$header: $content");
    }
    echo $this->content;
  }

}