<?php

namespace Yonkes\Exception;

use Exception;
use Yonkes\Base\Request;
use Yonkes\Concerns\CreatesJsonResponses;

abstract class AppException extends Exception
{

  use CreatesJsonResponses;

  public function __construct($message = '', $code = 0, Exception $previous = null)
  {
    parent::__construct($message, $code, $previous);
  }

  public abstract function render(Request $request);

}