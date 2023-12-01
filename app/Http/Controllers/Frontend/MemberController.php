<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\ApplyPost;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function registration()
    {
        // $tuition_apply=TuitionApply::all();
        return view('frontend.pages.registration'); //,compact('tuition_apply')
    }
    
    // profile view
    public function profile()
    {
        
        $apply_posts=ApplyPost::where('user_id',auth('member')->user()->id)->get();
        return view('frontend.pages.profile',compact('apply_posts'));
    }



    public function store(Request $request)
    {
        // dd($request->all());

        Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        notify()->success('User Registration successful.');
        return redirect()->back();
    }

    public function login()
    {
        return view('frontend.pages.login');
    }

    public function doLogin(Request $request)
    {   
        // dd($request->all());

        $val = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($val->fails()) {
            notify()->error($val->getMessageBag());
            return redirect()->back();
        }

        $credentials = $request->except('_token');
        // dd($credentials);
        if (auth()->guard('member')->attempt($credentials)) {
            notify()->success('success','You have login successfully');    
            return redirect()->route('home');
            // return redirect()->route('home');
        }

        notify()->error('Invalid Credentials.');
            return redirect()->back();

    }

    public function logout()
    {
        auth('member')->logout();
        notify()->success('Logout Success.');    
        return redirect()->route('home');
    }
}
