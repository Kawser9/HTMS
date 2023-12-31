@extends('frontend.master')


@section('content')
<div class="container" >
 <div class="row d-flex align-items-center justify-content-center"style="height: 70vh ">
    <div class="col-md-4 ">
        <div class="card" style="border-radius: 15px; background-color:#424242">
            <div class="card-body text-center">
              <div class="mt-3 mb-4 d-flex justify-content-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                  class="rounded-circle img-fluid" style="width: 100px;" />
              </div>
                
              
            <div>

                <h5 class="mb-2 text-white">Full Name: {{ auth('member')->user()->name }}</h5>
                
                <h5 class="mb-2 text-white">Email :{{ auth('member')->user()->email }}</h5>
                
                <h5 class="mb-2 text-white">Role :{{ auth('member')->user()->role }}</h5>

                <a class="btn btn-primary btn-rounded btn-lg text-white mb-3" href="{{Route('my.post',auth('member')->user()->id)}}">My Post</a>
                <a class="btn btn-primary btn-rounded btn-lg text-white mb-3" href="{{Route('applicent',auth('member')->user()->id)}}">Applyed</a>
                {{-- <div class="d-flex justify-content-between text-center mt-5 mb-2">
                        <div>
                            <p class="mb-2 h5 text-white">8471</p>
                            <p class="text-muted mb-0" style="color: white !important">Wallets Balance</p>
                        </div>
                        <div class="px-3">
                            <p class="mb-2 h5 text-white">8512</p>
                            <p class="text-muted mb-0 text-white">Income amounts</p>
                        </div>
                        <div>
                            <p class="mb-2 h5 text-white">4751</p>
                            <p class="text-muted mb-0 text-white">Total Transactions</p>
                        </div>
                </div> --}}
            </div>
          </div>
    </div>
    </div>
 </div>

<div class="container">

    <div class="row d-flex align-items-center justify-content-center  ">
        <div class="col-md-3">
              <table class="text-dark table table-sm table-dark">
                <div class="text-dark"> <h6>My All Post</h6> </div>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Class</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Contuct</th>
                    <th scope="col">Address</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($myPost as $detail)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$detail->email}}</td>
                            <td>{{$detail->class_list}}</td>
                            <td>{{$detail->subject_name}}</td>
                            <td>{{$detail->contact}}</td>
                            <td>{{$detail->address}}</td>
                            <td>{{$detail->salary}}</td>
                            <td>{{$detail->status}}</td>
                            <td>
                              
                              <a class="btn btn-danger" href="{{Route('request',$detail->id)}}">View Request</a>
                              <a class="btn btn-danger" href="{{Route('my.post.edit',$detail->id)}}">Edit</a>
                              
                        </tr>
                  @endforeach  
                </tbody>
              </table>
        </div>
    </div>  
</div>    
@endsection