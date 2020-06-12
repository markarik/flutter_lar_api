<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request, $exception)
    {


        if ($this->isModel($exception)) {
            return response()->json([
                'errors' => 'Product Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        if ($this->isHttp($exception)) {
            return response()->json([
                'errors' => 'Route Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $exception);


    }

    protected function isModel($exception)
    {
        return $exception instanceof ModelNotFoundException;
    }


    protected function isHttp($exception)
    {
        return $exception instanceof NotFoundHttpException;
    }
}