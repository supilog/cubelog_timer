<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultStoreRequest;
use App\Models\Result;
use App\Services\Cube;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CubeApiController extends Controller
{
    public function store(ResultStoreRequest $request, Cube $cube) {
        // 保存
        $result = new Result();
        $result->solve_date = new Carbon();
        $result->solve_time = ($request->solve_time / 1000);
        $result->scramble = $request->scramble;
        $result->save();

        $scramble = $cube->scramble();
        $scramble_text_array = $cube->scrambleToText($scramble);
        $scramble_text = implode(' ', $scramble_text_array);

        $data = [
            'status' => 'success',
            'scramble' => [
                'data' => $scramble,
                'text' => $scramble_text
            ],
            'input' => [
                'scramble' => $request->scramble,
                'solve_time' => $request->solve_time,
            ]
        ];
        return $data;
    }
}
