<?php

namespace App\Http\Controllers\Admin;

use App\Models\Donatur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donaturs = Donatur::latest()->when(request()->q, function($donaturs) {
            $donaturs = $donaturs->where('name', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.donatur.index', compact('donaturs'));
    }
}
