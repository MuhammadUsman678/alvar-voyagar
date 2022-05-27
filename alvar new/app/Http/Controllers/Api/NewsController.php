<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Resources\newsResource;

class NewsController extends Controller
{
    public function index(){
        $news =News::all();
        return response()->json(['data' => newsResource::collection($news) ],200);
    }
    public function getSingle($id){
        $news=News::find($id);
        return response()->json(['data' => new newsResource($news) ],200);
    }
}
