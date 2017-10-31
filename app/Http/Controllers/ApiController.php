<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as IlluminateResponse;

class ApiController extends Controller
{
	protected $statusCode = 200;

	public function getStatusCode()
	{
		return $this->statusCode;
	}

	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this; // chain
	}

	public function respondNotFound($message = 'Not Found!')
	{
		return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
	}

	public function respondInternalError($message = 'Internal Error!') // return $this->respondInternalError();
	{
		return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
	}

	public function respondCreated($message)
	{
		return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respond($message);
	}

	public function respond($data, $headers = [])
	{
		return Response::json($data, $this->getStatusCode(), $headers);
	}

	public function respondWithError($message)
	{
		return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
	}

	protected function respondWithPagination($lessons, $data)
    {
        $data = array_merge($data, [
            'paginator' => [
                'total' => $lessons->total(),
                'pages' => ceil($lessons->total() / $lessons->perPage()),
                'currentPage' => $lessons->currentPage(),
                'limit' => $lessons->perPage()
            ]
        ]);

        return $this->respond($data);
    }
}
