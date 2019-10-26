@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Boarding Details</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/confirm" enctype="multipart/form-data" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('address_of_boarding') ? ' has-error' : '' }}">
                            <label for="address_of_boarding" class="col-md-4 control-label">Address_Of_Boarding</label>

                            <div class="col-md-6">
                                <input id="address_of_boarding" type="text" class="form-control" name="address_of_boarding" value="{{ old('address_of_boarding') }}"autofocus>

                                @if ($errors->has('address_of_boarding'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_of_boarding') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('near_to') ? ' has-error' : '' }}">
                            <label for="near_to" class="col-md-4 control-label">Near To</label>

                            <div class="col-md-6">
                                <input id="near_to" type="text" class="form-control" name="near_to" value="{{ old('near_to') }}" autofocus>

                                @if ($errors->has('near_to'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('near_to') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="accomadation_type" class="col-md-4 control-label">Accomadation Type</label>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label><input type="radio" name="accomadation_type" value="House" checked>House</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="accomadation_type" value="Room">Room</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="available_for" class="col-md-4 control-label">Available For</label>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label><input type="radio" name="available_for" value="Girls" checked>Girls</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="available_for" value="Boys">Boys</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_of_boarders') ? ' has-error' : '' }}">
                            <label for="number_of_boarders" class="col-md-4 control-label">Number Of Boarders</label>

                            <div class="col-md-6">
                                <input id="number_of_boarders" type="number" min="0" class="form-control" name="number_of_boarders" value="{{ old('number_of_boarders') }}">

                                @if ($errors->has('number_of_boarders'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_of_boarders') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Number Of Rooms and  facilities</label>
                            <div class="col-md-12" layout="row">
                                <div class="col-md-3" layout="column">
                                </div>
                                <div class="col-md-6" layout="column">
                                
                                <div class="form-group{{ $errors->has('Attached_washroom') ? ' has-error' : '' }}">
                                <div class="form-group">
                                        <label for="Attached_washroom" class="col-md-4 control-label">Attached Washroom</label>

                                        <div class="col-md-6">
                                            <input id="Attached_washroom" type="number" min="0" class="form-control" name="Attached_washroom" value="{{ old('Attached_washroom') }}">
                                            @if ($errors->has('Attached_washroom'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('Attached_washroom') }}</strong>
                                            </span>
                                            @endif
                                </div>
                                </div>
                                   
                                    <div class="form-group{{ $errors->has('Washrooms') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        <label for="Washrooms" class="col-md-4 control-label">Washrooms</label>

                                        <div class="col-md-6">
                                            <input id="Washrooms" type="number" min="0" class="form-control" name="Washrooms" value="{{ old('Washrooms') }}" >
                                            @if ($errors->has('Washrooms'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('Washrooms') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('Bedrooms') ? ' has-error' : '' }}">
                                     <div class="form-group">
                                        <label for="Bedrooms" class="col-md-4 control-label">Bedrooms</label>

                                        <div class="col-md-6">
                                            <input id="Bedrooms" type="number" min="0" class="form-control" name="Bedrooms" value="{{ old('Bedrooms') }}">
                                            @if ($errors->has('Bedrooms'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('Bedrooms') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('Kitchen') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        <label for="Kitchen" class="col-md-4 control-label">Kitchen</label>

                                        <div class="col-md-6">
                                            <input id="Kitchen" type="number" min="0" class="form-control" name="Kitchen" value="{{ old('Kitchen') }}">
                                            @if ($errors->has('Kitchen'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('Kitchen') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('Single_Beds') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        <label for="Single_Beds" class="col-md-4 control-label">Single Beds</label>

                                        <div class="col-md-6">
                                            <input id="Single_Beds" type="number" min="0" class="form-control" name="Single_Beds" value="{{ old('Single_Beds') }}" >
                                            @if ($errors->has('Single_Beds'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('Single_Beds') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('Double_Beds') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        <label for="Double_Beds" class="col-md-4 control-label">Double Beds</label>

                                        <div class="col-md-6">
                                            <input id="Double_Beds" type="number" min="0" class="form-control" name="Double_Beds" value="{{ old('Double_Beds') }}">
                                            @if ($errors->has('Double_Beds'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('Double_Beds') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('Fans') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        <label for="Fans" class="col-md-4 control-label">Fans</label>

                                        <div class="col-md-6">
                                            <input id="Fans" type="number" min="0" class="form-control" name="Fans" value="{{ old('Fans') }}">
                                            @if ($errors->has('Fans'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('Fans') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('Cupboards') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        <label for="Cupboards" class="col-md-4 control-label">Cupboards</label>

                                        <div class="col-md-6">
                                            <input id="Cupboards" type="number" min="0" class="form-control" name="Cupboards" value="{{ old('Cupboards') }}" >
                                            @if ($errors->has('Cupboards'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('Cupboards') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('Chairs') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        <label for="Chairs" class="col-md-4 control-label">Chairs</label>

                                        <div class="col-md-6">
                                            <input id="Chairs" type="number" min="0" class="form-control" name="Chairs" value="{{ old('Chairs') }}">
                                            @if ($errors->has('Chairs'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('Chairs') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('Tables') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        <label for="Tables" class="col-md-4 control-label">Tables</label>

                                        <div class="col-md-6">
                                            <input id="Tables" type="number" min="0" class="form-control" name="Tables" value="{{ old('Tables') }}">
                                            @if ($errors->has('Tables'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('Tables') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-3" layout="column">
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('security_cam_available') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="security_cam_available" class="col-md-4 control-label">Security Cam</label>
                            <div class="col-md-6">
                                <select id="security_cam_available" class="form-control" name="security_cam_available"  >
                                    <option value="" disabled selected>--Select Type--</option>
                                    <option value="Available">Available</option>
                                    <option value="Not Available">Not Available</option>
                                </select>
                            </div>
                        </div>
                        </div>

                        <label> Select "Include" if the monthly charge include mentioned payments below </label><br><br>
                        <div class="form-group{{ $errors->has('electricity_bill') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="electricity_bill" class="col-md-4 control-label">Electricity Bill</label>
                            <div class="col-md-6">
                                <select id="electricity_bill" class="form-control" name="electricity_bill" >
                                    <option value="" disabled selected>--Select Type--</option>
                                    <option value="Include">Include</option>
                                    <option value="Not Include">Not Include</option>
                                </select>
                            </div>
                        </div>
                        </div>

                        <div class="form-group{{ $errors->has('Meals') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="Meals" class="col-md-4 control-label">Meals</label>
                            <div class="col-md-6">
                                <select id="Meals" class="form-control" name="Meals" >
                                    <option value="" disabled selected>--Select Type--</option>
                                    <option value="Include">Include</option>
                                    <option value="Not Include">Not Include</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('Water') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="Water" class="col-md-4 control-label">Water</label>
                            <div class="col-md-6">
                                <select id="Water" class="form-control" name="Water" >
                                    <option value="" disabled selected>--Select Type--</option>
                                    <option value="Include">Include</option>
                                    <option value="Not Include">Not Include</option>
                                </select>
                            </div>
                        </div>
                        </div>


                        <div class="form-group{{ $errors->has('rent') ? ' has-error' : '' }}">
                            <label for="rent" class="col-md-4 control-label">Monthly Boarding Charges</label>

                            <div class="col-md-6">
                                <input id="rent" type="number" min="0" class="form-control" name="rent" value="{{ old('rent') }}">

                                @if ($errors->has('rent'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rent') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" >
                            <center><label for="main_pic" class="col-md-4 control_label ">{{('Main Boarding Picture') }}</label></center>
    
                            <div class="col-md-6">
                                <input type="file" name="main_pic" id="main_pic" >
                                <!--input type="hidden" name="_token" value="{{ csrf_token() }}"-->
                            </div>
                        </div>

                        <div class="form-group row" >
                            <center><label for="boarding_pics" class="col-md-4 control_label ">{{('Other Boarding Pictures') }}</label></center>
    
                            <div class="col-md-6">
                                <input type="file" name="img[]" id="img[]"  multiple="true">
                            </div>
                        </div>

                           <div class="form-group{{ $errors->has('rules') ? ' has-error' : '' }}">
                            <label for="rules" class="col-md-4 control-label">Rules and Conditions</label>

                            <div class="col-md-6">
                                <input id="rules" type="text" class="form-control" name="rules" value="{{ old('rules') }}" autofocus >

                                @if ($errors->has('rules'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rules') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
