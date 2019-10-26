@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Complains</div>
                
                @if(Session::has('warning_message'))
                        <div class="alert alert-warning">
                            <span class="glyphicon glyphicon-ok"></span>
                            {!!session('warning_message')!!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                @endif 

                @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            <span class="glyphicon glyphicon-ok"></span>
                            {!!session('flash_message')!!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                @endif 
                
                
                
                <table class="table table hover table-bordered">
                       <thead>
                            <tr>
                                <th width="5">Complain No</th>
                                <th>Boarding No</th>
                                <th> User Email</th>
                                <th>Complain About</th>
                                <th>Complain</th>
                                <th>State</th>
                            </tr>
                       </thead>
                       <tbody>
                           @foreach($data as $key=>$value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->boarding_no}}</td>
                                <td>{{$value->user_email}}</td>
                                <td>{{$value->complain_about}}</td>
                                <td>{{$value->complain}}</td>
                                @if($value->state==0)
                                <td><h4><a href="{{URL('/receiveComplain'.$value->complain_id)}}"><button type="button" class="btn btn-info">Received</button></a></h4></td>
                                @endif

                                @if($value->state==1)
                                <td><h4><a href="{{URL('/solvedComplain'.$value->complain_id)}}"><button type="button" class="btn btn-success">Solved</button></a></h4></td>
                                @endif

                                @if($value->state==2)
                                <td><h4><a href="{{URL('/deleteComplain'.$value->complain_id)}}"><button type="button" class="btn btn-danger">Delete</button></a></h4></td>
                                @endif
                                
                            </tr>
                            
                           @endforeach
                           
                       </tbody>
                       </table>
                
                
            </div>
        </div>
    </div>
</div>
@endsection