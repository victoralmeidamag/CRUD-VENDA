<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getItens()
    {
        $response = Http::get(env('API_URL'). 'getItens');
        
        $data = $response->json();

        return view('produtos', ['produtos' => $data]);
    }

    public static function getItem($id)
    {
        $response = Http::get(env('API_URL'). 'getItem?produto='.$id);
        return  $response->json();
    }
}
