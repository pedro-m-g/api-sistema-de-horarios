<?php

namespace Timetables\Exception;

use Timetables\Base\Request;

class NotFoundException extends AppException
{

  public function render(Request $request)
  {
    return $this->json([
      'error' => 'Ruta no encontrada',
      'path' => $request->getPath(),
      'method' => $request->getMethod()
    ], 404);
  }

}