<?php

namespace App\Exceptions;

use Illuminate, Exception, Symfony;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($route = $request->route()) {
            if ($middleware = $route->middleware()) {
                if (in_array('api', $middleware)) {
                    return $this->renderApiResponse($exception);
                }
            }
        }

        return parent::render($request, $exception);
    }

    /**
     * @param $exception
     * @return Illuminate\Http\JsonResponse
     */
    public function renderApiResponse($exception)
    {
        if ($exception instanceof Illuminate\Validation\ValidationException) {
            return response()->json($exception->errors(), 422);
        }

        if ($exception instanceof Illuminate\Database\Eloquent\ModelNotFoundException) {
            return response()->json([], 404);
        }

        if ($exception instanceof Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return response()->json([], 404);
        }

        if ($exception instanceof Illuminate\Auth\Access\AuthorizationException) {
            return response()->json([], 403);
        }

        return $this->renderJson($exception);
    }

    /**
     * @credit https://stackoverflow.com/a/28947051/1662866
     * @param Exception $exception
     * @return Illuminate\Http\JsonResponse
     */
    public function renderJson(Exception $exception)
    {
        $response = [
            'errors' => 'Sorry, something went wrong.'
        ];

        if (config('app.debug')) {
            $response['exception'] = get_class($exception);
            $response['message'] = $exception->getMessage();
            $response['trace'] = $exception->getTrace();
        }

        $status = $this->isHttpException($exception) ? $exception->getStatusCode() : 400;

        return response()->json($response, $status);
    }
}
