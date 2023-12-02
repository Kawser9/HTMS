<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ApplyPost;
use App\Models\TuitionPost;
use Illuminate\Http\Request;

class ApplyPostController extends Controller
{
    // apply tuition post method
    public function applyNow($postId){ 
        //dd($id); 
        ApplyPost::create([
            'user_id'=>auth('member')->user()->id, 
           
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
    public function myPost($id)
    {
        $myPost=TuitionPost::where('user_id',$id)->get();
        // dd($myPost->all());
        return view('frontend.pages.mypost',compact('myPost'));
    }
    public function request($id)
    {
        // $userIDs = ApplyPost::where('tuition_post_id', $id)->pluck('user_id');
        // $request=ApplyPost::with(['TuitionPost','member'])->where('tuition_post_id',$id)->get();
        // return view('frontend.pages.request',compact('request'));

        $userIDs = ApplyPost::where('tuition_post_id', $id)->pluck('user_id');
        $request = ApplyPost::with(['tuitionPost', 'member'])->where('tuition_post_id', $id)->get();
        return view('frontend.pages.request', compact('request'));

        
    }
    
    public function applicent($id)
    {
        $applicentDetail=ApplyPost::with('TuitionPost')->where('user_id',$id)->get();
        // dd($applicentDetail->all());
        return view('frontend.pages.applicent',compact('applicentDetail'));
    }
}
