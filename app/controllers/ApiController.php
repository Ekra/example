<?php
/**
 * Created by PhpStorm.
 * User: akirachix
 * Date: 1/30/15
 * Time: 10:26 AM
 */

use Illuminate\Http\Response as IlluminateResponse;

class ApiController extends  BaseController{


    const HTTP_NOT_FOUND = 404;

    protected $statusCode = 200;

    public  function getStatusCode()
    {

        return $this->statusCode;
    }


    public function setStatusCode($statusCode)
    {

        $this->statusCode = $statusCode;

        return $this;
    }

    public  function respondNotFound($message = 'Not Found!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);

    }

    public  function respondInternalError($message = '  Internal Error!')

    {

        return $this->setStatusCode(500)->respondWithError($message);

    }


    protected function respondCreated($message)
    {

        return $this->setStatusCode(201)->respond([

            'message' => $message
        ]);

    }




    public  function respond($data, $headers = [])
    {

        return Response::json($data,$this->getStatusCode(),$headers);
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

    /**
     * @param Paginator $lessons
     * @return mixed
     */
    protected function respondWIthPagination(Paginator $lessons, $data)
    {
        $data = array_merge($data, [
            'paginator' => [
                'total_count' => $lessons->getTotal(),
                'total_pages' => ceil($lessons->getTotal() / $lessons->getPerPage()),
                'current_page' => $lessons->getCurrentPage(),
                'limit' => $lessons->getPerPage()
            ]

        ]);

        return $this->respond($data);

    }

} 