@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>

                <table class="table table hover table-bordered">
                       <thead>
                            <tr>
                                <th width="5">Comment No</th>
                                <th>Boarding_no</th>
                                <th> User Email</th>
                                <th>Comment</th>
                                <th>Block</th>
                            </tr>
                       </thead>
                       <tbody>
                           @foreach($data as $key=>$value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->boarding_no}}</td>
                                <td>{{$value->user_email}}</td>
                                <td>{{$value->comment}}</td>
                                @if($value->blocked==1)
                                <td><h4><a href="{{URL('/deleteComment'.$value->comment_id)}}"><button type="button" class="btn btn-danger">Remove</button></a></h4></td>
                                @endif

                                @if($value->blocked==0)
                                <td><h4><a href="{{URL('/deleteComment'.$value->comment_id)}}"><button type="button" class="btn btn-primary">Remove</button></a></h4></td>
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