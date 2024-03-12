<?php

namespace App\Http\Controllers\Api;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index()
    {
        //get data sliders
        $sliders = Slider::latest()->get();

        //return with response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Sliders',
            'data'    => $sliders,
        ], 200);
    }
}
