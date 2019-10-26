@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Find Boarding</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/find" enctype="multipart/form-data" >
                        {{ csrf_field() }}

                        
                        
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


                        <div class="form-group">
                            <label for="numbers_of_boarders" class="col-md-4 control-label">Number of Boarders</label>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label><input type="radio" name="numbers_of_boarders" value="a1" checked>0-5</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="numbers_of_boarders" value="a2">5-10</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="numbers_of_boarders" value="a3">10-20</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="numbers_of_boarders" value="a4">more than 20</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="rent" class="col-md-4 control-label">Rent for one person</label>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label><input type="radio" name="rent" value="b1" checked>below 1500</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="rent" value="b2">1500-2500</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="rent" value="b3">over 2500</label>
                                </div>
                               
                            </div>
                        </div>

                        

                        


                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Search
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