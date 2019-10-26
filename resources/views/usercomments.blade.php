@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                
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
                                <th width="5">No</th>
                                <th>User Email</th>
                                <th>No of Comments</th>
                                <th>No of blocked comments</th>
                                <th>Block</th>
                            </tr>
                       </thead>
                       <tbody>
                           @foreach($comment_user as $key=>$value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->user_email}}</td>
                                <td>{{$value->no_of_comments}}</td>
                                <td>{{$value->no_of_blocked}}</td>
                                @if($value->blocked==1)
                                <td><h4><a href="{{URL('/unblockuser'.$value->mail_id)}}"><button type="button" class="btn btn-danger">Unblock</button></a></h4></td>
                                @endif

                                @if($value->blocked==0)
                                <td><h4><a href="{{URL('/blockuser'.$value->mail_id)}}"><button type="button" class="btn btn-primary">Block</button></a></h4></td>
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