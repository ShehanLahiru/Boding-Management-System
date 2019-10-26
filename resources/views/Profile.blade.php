@extends('layouts.app')

@section('content')
                @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            <span class="glyphicon glyphicon-ok"></span>
                            {!!session('flash_message')!!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                @endif
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/profilepics/{{$user->profilepic}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{$user->username }}</h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="profilepic">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit"  class="pull-right btn btn-sm btn-primary">
        </div>

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
                             <tr>
                        <td><h4>Contact No:</h4></td>
                        <td><h4>{{$user->contactno}}</h4></td>
                      </tr>
                        
                      <tr>
                        <td><h4>Email:</h4></td>
                        <td><h4><a href="">{{$user->email}}</a></h4></td>
                      </tr>
                       
                           
                      </tr>
                    
                    </tbody>
                  </table>
                  <a href="{{ URL('/changePassword'.$user->id) }}" title="change password"><button class="btn btn-warning" >Change Password</button></a>
                  <a href="{{ URL('/EditProfile'.$user->id) }}" title="Edit your profile details"><button class="btn btn-success" >Edit Profile</button></a>
                  <a href="{{ URL('/deactivateAccount'.$user->id) }}" title="deactivate account"><button class="btn btn-danger" >Deactivate Account</button></a>
                  @if($user->admin== 0)
                  <a href="{{ URL('/createBoarding') }}" title="Add new boarding"><button class="btn btn-primary" >Add Boarding</button></a>
                  
                 
                  <br><br>

                  <div class="panel panel-success">
                  <div class="panel-heading">Your Boarding</div>
                  <div class="panel-body">
                  <table class="table table-user-information">
                  <tbody>
                  @foreach ($boardings as $boarding)
                  <tr>
                  <td style="width:80%">Boarding {{$boarding->address_of_boarding}}</td>
                  <td><h4><a href="{{URL('/viewProfileBoarding'.$boarding->boarding_no)}}"><button type="button" class="btn btn-primary">View</button></a></h4></td>
                  <td><h4><a href="{{URL('/editBoarding'.$boarding->boarding_no)}}"><button type="button" class="btn btn-success">Edit</button></a></h4></td>
                  <td><h4><a href="{{URL('/deleteBoarding'.$boarding->boarding_no)}}"><button type="button" class="btn btn-danger">Remove</button></a></h4></td>
                  <td><h4><a href="{{URL('/changeBoardingPicture'.$boarding->boarding_no)}}"><button type="button" class="btn btn-warning">Change Boarding Pictures</button></a></h4></td>
                  @endforeach
                  </tbody>
                  </table>
                  </div>
                  </div>
                  @endif
    </div>
</div>
@endsection