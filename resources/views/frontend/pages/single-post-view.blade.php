@extends('frontend.master')
@section('content')


<div class="container  mt-5">
    <div class="row justify-content-center">
        
            
                <div class="col-lg-4 mb-4 mb-lg-0 " >
                    <div class="testimonial-2 mb-4">
                        
                        @if($singlepost->role=='student')
                        <h3 class="h5">Need tuitor !</h3>
                        @else 

                        <h3 class="h5">Need Tuition</h3>
                        @endif
                       

                        <div class="d-flex v-card align-items-center">
                            <img src="{{url('/uploads/'.$singlepost->image)}}" alt="Image" class="img-fluid mr-3">
                        </div>
                        <h6>Name: {{$singlepost->name}}</h6>                       
                        <h6>Role: {{$singlepost->role}}</h6>
                        <h6>Email Address: {{$singlepost->email}}</h6>
                        
                        <h6>Class: {{$singlepost->class_list}}</h6>
                        <h6>Subject: {{$singlepost->subject_name}}</h6>
                        <h6>Salary: {{$singlepost->salary}} .BDT</h6>
                        <h6>Contact: {{$singlepost->contact}}</h6>
                        

                        
                        @if(!$singlepost->applications()->where('user_id', auth('member')->user()->id)->exists())
                            <a class="btn btn-primary" href="{{ route('apply.post.now', $singlepost->id) }}" role="button">Apply</a>
                        @else
                            <p style="color: red; margin-top:5px;">You Already Applied to This Post</p>
                        @endif

                        {{-- <blockquote class="mb-4">
                        <p>Class: {{$tpost->class_lits}}</p>
                        </blockquote> --}}
                        

                        
                    </div>
                </div>
            
        
    </div>
</div>
@endsection