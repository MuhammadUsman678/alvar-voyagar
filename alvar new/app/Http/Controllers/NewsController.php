<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    
    
    /**
     * Replicate Post.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function replicate(Request $request,$id,$edit=false)
    {
        $news=News::find($id);
        $replicate = $news->replicate();
        $replicate->save();
        if($edit){
            return redirect($request->route()->getPrefix().'/news/'.$replicate->id.'/edit/');
        }
        return back()->with('success','News Replicate Successfully!.');
    }

    
}
