<?php

namespace App\Http\Controllers\Admin\Api;


use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     *
     */
    const CODE_NOT_FOUND = 'CODE_NOT_FOUND';
    /**
     *
     */
    const CODE_INTERNAL_ERROR = 'CODE_INTERNAL_ERROR';
    
    
    /**
     * @param int $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param $data
     * @param $transformer
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseJsonWith($data, $transformer)
    {
        if (!$data) {
            //不存在
            return $this->responseWithNotFound('Requested response not found!');
        } elseif ($data instanceof Model) {

            return $this->responseWithItem($data, $transformer);
        } elseif ($data instanceof Collection || $data instanceof LengthAwarePaginator) {

            return $this->responseWithCollection($data, $transformer);
        } else {

            return $this->responseWithInternalError();
        }

    }


    /**
     * @param $data
     * @param $transformer
     * @return \Cyvelnet\Laravel5Fractal\Adapters\ScopeDataAdapter
     */
    public function responseWithItem($data, $transformer)
    {
        return Fractal::item($data, $transformer);
    }


    /**
     * @param $data
     * @param $transformer
     * @return \Cyvelnet\Laravel5Fractal\Adapters\ScopeDataAdapter
     */
    public function responseWithCollection($data, $transformer)
    {
        return Fractal::collection($data, $transformer);
    }

    /**
     * @param array $data
     * @param array $header
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseWithArray(array $data=[], array $header=[])
    {
        return Response::json($data, $this->statusCode, $header);
    }


    /**
     * @param $message
     * @param $codeStatus
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseWithError($message, $codeStatus)
    {
        return $this->responseWithArray([
            'error' => [
                'code' => $codeStatus,
                'http_code' => $this->statusCode,
                'message' => $message
            ]
        ]);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseWithNotFound($message='Resource Not Found')
    {
        return $this->setStatusCode(404)
                    ->responseWithError($message, self::CODE_NOT_FOUND);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseWithInternalError()
    {
        return $this->setStatusCode(500)
                    ->responseWithError('InternalError', self::CODE_INTERNAL_ERROR);
    }

}
