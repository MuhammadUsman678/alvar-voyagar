<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        // dd($replicate);
        //Copy Banner Image with new Name
        // try{
            $bannerFileName= explode('.',$replicate->banner_img);
            $bannerFileExtension = File::extension($replicate->banner_img);
            $bannerNewImage = $bannerFileName[0].date('hs',strtotime(now())).'.'.$bannerFileExtension;
            $bcopyFrom='public/storage/'.$bannerFileName[0].'.'.$bannerFileExtension;
            $bcopyTo='public/storage/'.$bannerNewImage;
            File::copy(base_path($bcopyFrom),base_path($bcopyTo));
    
            //Copy Thubmnail Image with new Name
            $thubmnailFileName= explode('.',$replicate->thumbnail);
            $thubmnailFileExtension = File::extension($replicate->thumbnail);
            $thubmnailNewImage = $thubmnailFileName[0].date('hs',strtotime(now())).'.'.$thubmnailFileExtension;
            $tcopyFrom='public/storage/'.$thubmnailFileName[0].'.'.$thubmnailFileExtension;
            $tcopyTo='public/storage/'.$thubmnailNewImage;
            File::copy(base_path($tcopyFrom) , base_path($tcopyTo));

            $replicate->banner_img=$bannerNewImage;
            $replicate->thumbnail=$thubmnailNewImage;
            $replicate->save();
        // }
        // catch(\Exception $e){

        // }

       
        if($edit){
            return redirect($request->route()->getPrefix().'/news/'.$replicate->id.'/edit/');
        }
        return back()->with('success','News Replicate Successfully!.');
    }

    
}
