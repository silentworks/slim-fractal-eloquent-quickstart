<?php namespace App\Controllers;

use League\Fractal;
use League\Fractal\TransformerAbstract;

/**
 * Class ApiController
 * @package App\Controllers
 */
abstract class ApiController
{
    protected $fractal;

    public function __construct()
    {
        $this->fractal = new Fractal\Manager();
        $this->fractal->setRequestedScopes(explode(',', isset($_GET['embed']) ?: ''));
    }

    public function respondWithItem($collection, TransformerAbstract $transformer)
    {
        $resource = new Fractal\Resource\Item($collection, $transformer);
        $this->respondJSON($resource);
    }

    public function respondWithCollection($collection, TransformerAbstract $transformer)
    {
        $resource = new Fractal\Resource\Collection($collection, $transformer);
        $this->respondJSON($resource);
    }

    private function respondJSON($resource)
    {
        $body = $this->fractal->createData($resource)->toJson();

        \View::json($body, 200);
    }
}
