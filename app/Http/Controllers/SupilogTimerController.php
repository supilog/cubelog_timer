<?php

namespace App\Http\Controllers;

use App\Services\Cube;
use Illuminate\Http\Request;

class SupilogTimerController extends Controller
{
    public function index(Cube $cube) {

        $scramble = $cube->scramble();
        $scramble_text_array = $cube->scrambleToText($scramble);
        $scramble_text = implode(' ', $scramble_text_array);
        $data = [
            'scramble' => $scramble,
            'scramble_text_array' =>$scramble_text_array,
            'scramble_text' => $scramble_text
        ];

        return view('timers.index', $data);
    }
}
