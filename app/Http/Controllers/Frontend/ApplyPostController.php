<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ApplyPost;
use Illuminate\Http\Request;

class ApplyPostController extends Controller
{
    // apply tuition post method
    public function applyNow($postId){ 
        //dd($id); 
        ApplyPost::create([
            'user_id'=>auth()->user()->id, 
           
            'tuition_post_id'=>$postId, 
            
           ]);
           
            notify()->success('Post Applied ⚡️');
            return redirect()->back();   
    }

    public function cancelApply($applypost_id)
    {

        $apply=ApplyPost::find($applypost_id);
        if($apply)
        {
            $apply->update([
                'status'=>'cancelled'
            ]);
        }

        notify()->success('Apply Cancelled');
       return redirect()->back();
    }
}
