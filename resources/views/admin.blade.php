@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                
                @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            <span class="glyphicon glyphicon-ok"></span>
                            {!!session('flash_message')!!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                @endif  

                @if(Session::has('warning_message'))
                        <div class="alert alert-warning">
                            <span class="glyphicon glyphicon-ok"></span>
                            {!!session('warning_message')!!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                @endif 
                
                
                
                <h4><center>Admin</center></h4>
                   <table class="table table hover table-bordered">
                        <thead>
                             <tr>
                                 <th width="5">No.</th>
                                 <th>Member Name</th>
                                 <th>Email</th>
                                 <th>Remove</th>
                             </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key =>$value)
                            @if($value->admin== 1)
                             <tr>
                                 <td>{{$value->id}}</td>
                                 <td>{{$value->name}}</td>
                                 <td>{{$value->email}}</td>
                                 @if($value->id==1)
                                 <td>Super Admin<td>
                                 @endif

                                 @if($value->id!=1)
                                 <td><h4><a href="{{URL('/deleteUser'.$value->id)}}"><button type="button" class="btn btn-danger">Remove</button></a></h4><td>
                                 @endif
                             </tr>
                             @endif
                            @endforeach
                        </tbody>
                    </table>
                    <h3><center><a href ="{{ route('register') }}">Add new Admin</a></center></h3>
                
            </div>
        </div>
    </div>
</div>
@endsection