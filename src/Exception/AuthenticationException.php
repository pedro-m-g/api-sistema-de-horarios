<?php

namespace Timetables\Exception;

use Timetables\Base\Request;

class AuthenticationException extends AppException
{

  public function render(Request $request)
  {
    return $this->json([
      'error' => $this->message
    ], 403);
  }

}