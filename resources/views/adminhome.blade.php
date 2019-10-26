@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                </div>        
                    @endif
                    <div class="alert alert-success">
                        <p>You are logged in as ADMINISTRATOR</p>
                    </div>
                    @if(Session::has('warning_message'))
                        <div class="alert alert-warning">
                            <span class="glyphicon glyphicon-ok"></span>
                            {!!session('warning_message')!!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                    @endif    
                    
                    
                    
                    
                   <table class="table table hover table-bordered">
                       <thead>
                            <tr>
                                <th width="5">No.</th>
                                <th>Member Name</th>
                                <th>Email</th>
                                <th>View User</th>
                                <th>Remove User</th>
                            </tr>
                       </thead>
                       <tbody>
                           @foreach($users as $key =>$value)
                           @if($value->admin== 0)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td><h4><a href="{{URL('/viewUser'.$value->id)}}"><button type="button" class="btn btn-primary">View</button></a></h4></td>
                                <td><h4><a href="{{URL('/deleteUser'.$value->id)}}"><button type="button" class="btn btn-danger">Remove</button></a></h4></td>
                                
                            </tr>
                            @endif
                           @endforeach
                           
                       </tbody>
                       </table>

                       

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
