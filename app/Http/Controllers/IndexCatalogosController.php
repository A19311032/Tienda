<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexCatalogosController extends Controller
{
    public function index(Request $request)
    {
        return view('catalogos/index_catalogos');
    }
}
