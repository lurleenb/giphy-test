<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Giphy;
use App\User;

class GiphyController extends Controller
{
    /*public function get(string $id): JsonResponse {
        $book = Book::find($id);
    
        if (empty($book)) {
            return new JsonResponse (
                null,
                JsonResponse::HTTP_NOT_FOUND
            );
        }
    
        return response()->json(['book' => $book]);
    }*/
    
    public function index()
    {
       /// $tasks = Task::all();
        //return view('tasks', 'index', compact('tasks'));
        return "in giphy index";
    }
    
    public function show()
    {
        return "in giphy search";
    }
    
    public function search($query)
    {
        $giphy = new Giphy();
        $result = $giphy->search($query);
        //return view('search', 'result');
        $x = json_decode($result);
                if($x->pagination->count==0)
        {
                    
            return "";
        } else {
        //$return_json=[];
           foreach($x->data as $data) {
    echo "data is ".$data->id."<\br>";
    echo "data is ".$data->url."<\br>";
    
    /*$stuff = array(
  array( 'label' => 'name 1', 'value' => 1 ),
  array( 'label' => 'name 2', 'value' => 2 ),
  array( 'label' => 'name 3', 'value' => 3 ),
);
echo json_encode( $stuff )     */
    
$array['data'][] = [
         "gif_id" => $data->id,
             "url" => $data->url
         ];

 
    
   }
   print_r($array,true);
        $result1 = json_encode($result);
    //    echo "from result1 ".$result1->data->id."\n";
        //if (count($x->data) == 0)

            //return "yes";
            //$response = $this->buildResponse($result);
            //return response($result, 200)
             //     ->header('Content-Type', 'application/json');
        }
        
        //return json_decode($result);
        //return json_encode($result, JSON_PRETTY_PRINT);
        //return $result;
        //return "in giphy searchccc $query";
        
        return response($array, 200)
                  ->header('Content-Type', 'application/json');
    }
    
    /*public function show(Task $task)
    {
        //$task = Task::find($id);
    
        return view('tasks.show', compact ('task'));
    }*/
    
    private function buildResponse($result)
    {
        echo "in buildResponse ".print_r($result,true);
           foreach($result->data as $data) {
    echo "data is ".$data->type."\n";
   }
        //echo $result->data->id."\n";
        return "xxx";
    }
}
