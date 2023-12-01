<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\TuitionPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // $tuitionposts=TuitionPost::all();

        $tuitionposts = TuitionPost::where('role' , '=', 'tuitor')->where('status','approved')->get();

        $studentposts = TuitionPost::where('role' , '=', 'student')->where('status','approved')->get();
        //dd( $studentposts->toarray());
        return view('frontend.partial.homeDashboard',compact('studentposts', 'tuitionposts'));
       
    }
    
}
