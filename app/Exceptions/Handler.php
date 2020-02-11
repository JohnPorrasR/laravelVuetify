<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Exception;
use HttpException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponser;

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    public function render($request, Exception $exception)
    {
        if($exception instanceof ValidationException)
        {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }

        if($exception instanceof ModelNotFoundException)
        {
            $modelo = strtolower(class_basename($exception->getModel()));
            return $this->errorResponce("No existe ninguna instancia de {$modelo} con el id especificado", 404);
        }

        if ($exception instanceof AuthenticationException)
        {
            return $this->unauthenticated($request, $exception);
        }

        if ($exception instanceof AuthenticationException)
        {
            return $this->errorResponce('No posee permisos para ejecutar esta accion', 403);
        }

        if ($exception instanceof NotFoundHttpException)
        {
            return $this->errorResponce('No se encontro la url especificada', 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException)
        {
            return $this->errorResponce('El método especificado en la petición no es válido', 405);
        }

        if ($exception instanceof HttpException)
        {
            return $this->errorResponce($exception->getMessage(), $exception->getStatusCode());
        }

        if ($exception instanceof QueryException)
        {
            $codigo = $exception->errorInfo[1];
            if($codigo == 1451)
            {
                return $this->errorResponce('No se puede eliminar de forma permanente el recurso por que está relacionado con algún otro.', 409);
            }
        }

        if($exception instanceof TokenMismatchException)
        {
            return redirect()->back()->with($request->input());
        }

        if(config('app.debug'))
        {
            return parent::render($request, $exception);
        }
        return $this->errorResponce('Falla inesperada. Intente luego', 500);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if($this->isFrontend($request))
        {
            return redirect()->guest('login');
        }
        return $this->errorResponce('No autenticado.', 401);
    }

    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();
        return $this->errorResponce($errors, 422);
    }

    private function isFrontend($request)
    {
        return $request->acceptsHtml() && collect($request->route()->middleware())->contains('web');
    }
}
