<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Giphy;
use App\User;

class GiphyController extends Controller
{
    
    public function index()
    {
        return view('welcome');
    }
    
    public function search($query)
    {
        $giphy = new Giphy();
        $result = $giphy->search($query);
        if ($result->pagination->count < 5)
        {    
            return "";
        } else {
           foreach($result->data as $data) {
                $array['data'][] = [
                    "gif_id" => $data->id,
                     "url" => $data->url
                ];
           }
        }
        
        return response($array, 200)
                  ->header('Content-Type', 'application/json');
    }
}
