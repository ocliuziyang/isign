<?php

namespace App\Http\Controllers\Admin\Api;

use App\Bus;
use App\Transformers\BusTransformer;
use Illuminate\Http\Request;

class BusController extends ApiController
{
    //

    public function index()
    {
        $buses =  Bus::all();
        return $this->responseWithCollection($buses, new BusTransformer());
    }
}
