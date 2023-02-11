<?php

namespace App\Http\Controllers;

use App\Models\Coba;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class TesController extends Controller
{
    public function index()
    {
        return view('coba');
    }

    public function store(Request $request)
    {
       
        $payload = $request->getContent();
        $data = json_decode($payload, true);
        
        dd($data);

    }
}
