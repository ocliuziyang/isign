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

    public function delete($id)
    {
        if (Bus::destroy($id) > 0) {
            return $this->responseWithArray([
                'status' => 1,
                'message' => 'successful deleted！'
            ]);
        } else {
            return $this->responseWithArray([
                'status' => 0,
                'message' => 'failing deleted！'
            ]);
        }
    }
}
