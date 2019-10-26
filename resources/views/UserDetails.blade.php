@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/profilepics/{{$user->profilepic}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{$user->username }}</h2>
        </div>
        <form action=""></form>
        <div class=" col-md-10 col-md-offset-1 "> 
                  <table class="table table-user-information">
                    <tbody>
                    
                      <tr>
                        <td><h4>Name:</td></h4> 
                        <td><h4>{{$user->name}}</td></h4>
                      </tr>
                      <tr>
                        <td><h4>Address:</h4></td>
                        <td><h4>{{$user->address}}</h4></td>
                      </tr>
                      <tr>
                        <td><h4>NIC Number:</h4></td>
                        <td><h4>{{$user->nicno}}</h4></td>
                      </tr>
                   
                      
                      <tr>
                        <td><h4>Contact No:</h4></td>
                        <td><h4>{{$user->contactno}}</h4></td>
                      </tr>
                        
                      <tr>
                        <td><h4>Email:</h4></td>
                        <td><h4><a href="">{{$user->email}}</a></h4></td>
                      </tr>
                       
                      
                      <tr><td><h4>Boarding</h4></td></tr>
                        @foreach ($boardings as $boarding)
                        <tr>
                        <td><h4>Boarding {{$boarding->address_of_boarding}}</h4><td>
                        <td><h4><a href="{{URL('/viewBoarding'.$boarding->boarding_no) }}"><button type="button" class="btn btn-primary">View</button></a></h4></td>
                        <td><h4><a href="{{URL('/deleteBoarding'.$boarding->boarding_no)}}"><button type="button" class="btn btn-danger">Delete</button></a></h4></td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                  </table>
                  </div>
    </div>    
</div>

@endsection