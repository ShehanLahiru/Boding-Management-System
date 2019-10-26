@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">Select Boarding</div>   
                    
                    
                    <form align="right" action="/search" method="get" >
                        <div class="col-md-4">
                        <div class="form-group">
                            <input type="search" class="form-control" name="search" align="right">
                            <span class="form-group-btn">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                        </div>
                        </div>
                    </form>
                    
                
                <br>
                <br>
                <br>
                <br>
                <br>
                
                @foreach($atts as $att)

                <table class="table table-hover text-centered" border="0">
                <tbody>
                <div class="panel panel-default">              
                
                <div class="panel-body">Boarding No : {{$att->boarding_no}} </div><br>
                <div class="panel-body">
                <img src="/uploads/boardingpic/{{$att->picture}}" style="width:150px; border: 2px solid black; height:150px; float:left;  margin-right:25px;">
                <br>Address Of Boarding : {{$att->address_of_boarding}}
                <br>Accomadation Type : {{$att->accomadation_type}}
                <br>Available For : {{$att->available_for}}
                <br>Number Of Boarders : {{$att->number_of_boarders}}
                <br>Boarding Charges : {{$att->rent}}
                
                <tr>
                <td style="width:90%"></td>
                <td style="width:90%"><a href="{{ URL('/viewBoarding'.$att->boarding_no) }}"><button type="button" class="btn btn-primary">View Boarding</button><a></td>
                </div>
              
                
                <!--td style="width:90%"><a href="{{ URL('/viewBoarding'.$att->boarding_no) }}"><button type="button" class="btn btn-primary">View Boarding</button><a></td-->
                </div>
                </tbody>
                 </table> 
                
                
                @endforeach
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection