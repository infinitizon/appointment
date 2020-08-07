@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">


                <div class="card-group">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-danger">
                                        <i class="fa fa-user-secret fa-2"></i>
                                    </span>
                                </div>
                                <div>Total Patients</div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light">
                                        {{count($clients)}}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg btn-info">
                                        <i class="fa fa-user-md fa-2"></i>
                                    </span>
                                </div>
                                <div>Total Doctors</div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light">{{count($doctors)}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-success">
                                        <i class="fa fa-calendar fa-2"></i>
                                    </span>
                                </div>
                                <div>Upcoming appointments</div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light">{{count($appointments)}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Column -->
                </div>


                </div>
            </div>
        </div>
    </div>
@endsection
