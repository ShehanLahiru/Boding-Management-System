@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
            
            
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
                @foreach($data as $data2)
                
                <table class="table table-hover text-centered" style="table-align: right; table width=50%;">
                    <tbody>
                    
                    <tr>
                    <td>Boarding No</td>
                    <td>{{$data2->boarding_no}}</td>
                    </tr>
                    
                    
                    <tr>
                    <td>Address of the Boarding</td>
                    <td>{{$data2->address_of_boarding}}</td>
                    </tr>

                    <tr>
                    <td>Near To</td>
                    <td>{{$data2->near_to}}</td>
                    </tr>

                    <tr>
                    <td>Accomadation Type</td>
                    <td>{{$data2->accomadation_type}}</td>
                    </tr>

                    <tr>
                    <td>Available for</td>
                    <td>{{$data2->available_for}}</td>
                    </tr>

                    <tr>
                    <td>Number Of Boarders</td>
                    <td>{{$data2->number_of_boarders}}</td>
                    </tr>

                    <tr>
                    <td>Security Camera Availability</td>
                    <td>{{$data2->security_cam_available}}</td>
                    </tr>

                    <tr>
                    <td>Boarding Fees Per Month</td>
                    <td>{{$data2->rent}}</td>
                    </tr>

                    <tr>
                    <td>Rules and Conditions</td>
                    <td>{{$data2->rules}}</td>
                    </tr>
                    
                    </tbody>
                </table>
                @endforeach
                </div>
                </div>

                

                <div class="panel panel-success">
                <div class="panel-heading">Room Details</div>
                <div class="panel-body">
                <table class="table table-hover text-centered" table width="400" style="table-align: right; table width:50%;">
                    <tbody>
                    
                    @foreach($adata as $data1)

                    <tr>
                    <td style="width:25%">{{$data1->room_type}}</td>
                    <td style="width:25%">{{$data1->number_of_rooms}}</td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                </table>    
                </div>
                </div>

                <div class="panel panel-success">
                <div class="panel-heading">Facility Details</div>
                <div class="panel-body">
                <table class="table table-facility-information" style="text-align: left;">
                    <tbody>
                    @foreach($bdata as $data3)

                    <tr>
                    <td style="width:25%">{{$data3->facility_type}}</td>
                    <td style="width:25%">{{$data3->number_of_facility}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                </div>

                <div class="panel panel-success">
                <div class="panel-heading">Charge Details (Charging for facilities)</div>
                <div class="panel-body">
                <table class="table table-facility-information" style="text-align: left;">
                    <tbody>
                    @foreach($cdata as $data4)

                    <tr>
                    <td style="width:25%">{{$data4->charge_type}}</td>
                    <td style="width:25%">{{$data4->availability}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                </div>
                
                <div class="panel panel-success">
                <div class="panel-heading">Owner Details </div>
                <div class="panel-body">
                <table class="table table-facility-information" style="text-align: left;">
                    <tbody>
                    @foreach($ddata as $data5)

                    <tr>
                    <td style="width:25%">Name</td>
                    <td style="width:25%">{{$data5->name}}</td>
                    </tr>

                    <tr>
                    <td style="width:25%">Email</td>
                    <td style="width:25%">{{$data5->email}}</td>
                    </tr>

                    <tr>
                    <td style="width:25%">Nic Number</td>
                    <td style="width:25%">{{$data5->nicno}}</td>
                    </tr>

                    <tr>
                    <td style="width:25%">Contact No</td>
                    <td style="width:25%">{{$data5->contactno}}</td>
                    </tr>

                    <tr>
                    <td style="width:25%">Address Of The Owner</td>
                    <td style="width:25%">{{$data5->address}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                </div> 

                <div class="panel panel-success">
                <div class="panel-heading">Comments</div>
                <div class="panel-body">
                
                    
                    @foreach($edata as $data6)

                    <br>
                    <br><b>{{$data6->user_email}}</b>
                    <br>{{$data6->comment}}
                    
                    @endforeach
                    
                
                </div>
                </div>
                
                @foreach($data as $data7)
                <form method="POST" action="/addcomment">
                {{ csrf_field() }}
                Email: <input type='text' name='user_email' id='user_email' /><br />
                       <input type="hidden" id="boarding_no" name="boarding_no" value="{{$data7->boarding_no}}">

                Comment:<br />
                <textarea name='comment' id='comment'></textarea><br />
            
                <input type='submit' value='Submit' />  
                </form>
                @endforeach

                <div class="col-md-offset-8">
                <h4><a href="{{URL('/addComplain'.$data7->boarding_no)}}"><button type="button" class="btn btn-danger">Complain About This Boarding</button></a></h4>
                <div>

            </div>
        </div>
    </div>
</div>
@endsection


