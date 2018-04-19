<?php

namespace Timestables\Exception;

use Timetables\Base\Request;

class DatabaseException extends AppException
{

  public function render(Request $request)
  {
    return $this->json([
      'error' => $this->message
    ], 500);
  }

}