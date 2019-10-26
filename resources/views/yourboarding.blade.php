@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Boarding</div>
                
                <div class="panel-body" >
                <table class="table table-facility-information" style="text-align: left;">
                    <tbody>
                    
                    @foreach($fdata as $data8)

                    <img src="/uploads/boardingpic/{{$data8->picture}}" class="img-rounded" style="border: 2px solid black; width:150px; height:150px; float:left;  margin-right:25px;">
                     
                   
                    @endforeach
                    
                    </tbody>
                </table>
                </div>
                

                <div class="panel panel-primary" >
                <div class="panel-heading">Boarding Details</div>
                <div class="panel-body">
                <table class="table table-user-information">
                    <tbody>
                    @foreach($data as $data1)
                    <tr>
                        <td><h4>Boarding No</td></h4> 
                        <td><h4>{{$data1->boarding_no}}</td></h4>
                    </tr>
                    <tr>
                        <td><h4>Address</td></h4> 
                        <td><h4>{{$data1->address_of_boarding}}</td></h4>
                    </tr>
                    <tr>
                        <td><h4>Near To </td></h4> 
                        <td><h4>{{$data1->near_to}}</td></h4>
                    </tr>
                    <tr>
                        <td><h4>Accomadation Type </td></h4> 
                        <td><h4>{{$data1->accomadation_type}}</td></h4>
                    </tr>
                    <tr>
                        <td><h4>Available_for </td></h4> 
                        <td><h4>{{$data1->available_for}}</td></h4>
                    </tr>
                    <tr>
                        <td><h4>Number of Boarders</td></h4> 
                        <td><h4>{{$data1->number_of_boarders}}</td></h4>
                    </tr>
                    <tr>
                        <td><h4>Security Camera Available</td></h4> 
                        <td><h4>{{$data1->security_cam_available}}</td></h4>
                    </tr>
                    <tr>
                        <td><h4>Boarding Charge(For Month)</td></h4> 
                        <td><h4>{{$data1->rent}}</td></h4>
                    </tr>
                    <tr>
                        <td><h4>Rules and Conditions</td></h4> 
                        <td><h4>{{$data1->rules}}</td></h4>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    </div>
                    </div>
                   
                    <div class="panel panel-success" >
                    <div class="panel-heading">Rooms</div>
                    <div class="panel-body">
                    <table class="table table-user-information">
                    <tbody>
                   
                     @foreach($adata as $data1)

                    <tr>
                    <td style="width:25%"><h4>{{$data1->room_type}}</h4></td>
                    <td style="width:25%"><h4>{{$data1->number_of_rooms}}</h4></td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    
                    </div>
                    </div>

                    <div class="panel panel-success">
                    <div class="panel-heading">Facilities</div>
                    <div class="panel-body">
                    <table class="table table-user-information">
                    <tbody>
                    @foreach($bdata as $data3)

                    <tr>
                    <td style="width:25%"><h4>{{$data3->facility_type}}</h4></td>
                    <td style="width:25%"><h4>{{$data3->number_of_facility}}</h4></td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    </div>
                    </div>

                    <div class="panel panel-success">
                    <div class="panel-heading">Charges</div>
                    <div class="panel-body">
                    <table class="table table-user-information">
                    <tbody>
                   
                    @foreach($cdata as $data4)

                    <tr>
                    <td style="width:25%"><h4>{{$data4->charge_type}}</h4></td>
                    <td style="width:25%"><h4>{{$data4->availability}}</h4></td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    </div>
                    </div>

                    <div class="panel panel-success">
                    <div class="panel-heading">User Comments</div>
                    <div class="panel-body">
                   
                   
                    @foreach($edata as $data6)

                    <br>
                    <br><b>{{$data6->user_email}}</b>
                    <br>{{$data6->comment}}
                    
                    @endforeach
                    </div>
                    </div> 
                      
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
@endsection