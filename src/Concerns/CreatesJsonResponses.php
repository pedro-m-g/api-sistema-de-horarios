<?php

namespace Timetables\Concerns;

use Timetables\Base\Response;

trait CreatesJsonResponses
{

  public function json($object, $code = 200, $headers = [])
  {
    $headers['Content-Type'] = 'application/json';
    return new Response(json_encode($object), $code, $headers);
  }
  
}