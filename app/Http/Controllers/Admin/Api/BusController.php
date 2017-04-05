<?php

namespace App\Http\Controllers\Admin\Api;

use App\Bus;
use App\Http\Requests\BusUpdateRequest;
use App\Transformers\BusTransformer;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusController extends ApiController
{
    //

    public function index()
    {
        $buses =  Bus::all();
        return $this->responseWithCollection($buses, new BusTransformer());
    }

    public function getBusesAvailableList()
    {
        return $this->index();
    }

    public function show($id)
    {

        $bus = Bus::findOrFail($id);
        return $this->responseWithItem($bus, new BusTransformer());
    }

    public function store(BusUpdateRequest $request)
    {
        /**
         * 'bus' =>
        array (
        'is_active' => true,
        'status' => 0,
        'name' => 'fdsfsd',
        'description' => 'fsdafdsf',
        'seat_count' => '12',
        ),
         */
        $array = $request->get('bus');

//        $validator = Validator::make($array, [
//            'name' => 'required',
//            'seat_count' => 'required|numeric|max:100',
//            'is_active' => 'required',
//            'status' => 'required'
//        ]);
//
//
//        if ($validator->fails()) {
//            return $this->responseWithArray([
//                'status' => 0,
//                'messate' => $validator->errors()
//            ]);
//        }

        $res = Bus::create($array);
        if ($res) {
            return [
                'status' => 1,
                'message' => '成功新建车辆!'
            ];
        } else {
            return [
                'status' => 0,
                'message' => '创建车辆失败!'
            ];
        }

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

    public function update(BusUpdateRequest $request)
    {

        $bus = $request->get('bus');
        $res = Bus::find($bus['id'])->update($bus);

        if ($res) {
            return $this->responseWithArray([
                'status' => 1,
                'message' => '修改成功！'
            ]);
        } else {
            return $this->responseWithArray([
                'status' => 0,
                'message' => '修改失败！'
            ]);
        }

    }
}
