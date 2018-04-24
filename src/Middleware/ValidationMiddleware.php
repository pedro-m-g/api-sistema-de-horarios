<?php

namespace Timetables\Middleware;

use Timetables\Base\Application;
use Timetables\Base\Request;
use Timetables\Base\Response;

class ValidationMiddleware extends Middleware
{

    public function handle(Request $request, Application $app)
    {
        if (!array_key_exists('validator', $request->_metadata)) {
            return $this->next->handle($request, $app);
        }
        $validatorClass = new $request->_metadata['validator'];
        $validator = new $validatorClass();
        $errors = $validator->validate($request, $app);
        if (empty($errors)) {
            return $this->next->handle($request, $app);
        }
        return new Response(json_encode($errors), 422);
    }

}