@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change Boarding Picture</div>

                
                
                
                <table class="table table hover table-bordered">
                       <thead>
                            <tr>
                                <th width="5">Picture</th>
                                <th width="5">Change Picture</th>
                            </tr>
                       </thead>
                       <tbody>
                       @foreach($data as $data1)
                            <tr>
                                <td> <img src="/uploads/boardingpic/{{$data1->picture}}" class="img-rounded" style="border: 2px solid black; width:150px; height:150px; float:left;  margin-right:25px;"></td>
                                <td>
                                
                                <form enctype="multipart/form-data" action="{{URL('/boardingpic'.$data1->Picture_id)}}" method="POST">
                                <label>Update This Image</label>
                                <input type="file" name="boarding_pic">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit"  class="pull-right btn btn-sm btn-primary">
                                </td>
                            </tr>
                        @endforeach    
                           
                           
                       </tbody>
                       </table>




                

                
            </div>
        </div>
    </div>
</div>
@endsection