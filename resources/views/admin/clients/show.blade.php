@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clients.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12" id="client_detail_result">
                    <div class='mr-5 mb-2 ml-5 align-top'>
                        <div class='row border'>
                            <div class='col-sm-4 p-2 border border-top-0 border-bottom-0'><b>@lang('quickadmin.clients.fields.last-name')</b>
                                <h3 class='ml-3 d-inline display-4 text-uppercase'>{{$client->last_name}}</h3></div>
                            <div class='col-sm-4 p-2 border border-top-0 border-bottom-0'><b>@lang('quickadmin.clients.fields.first-name')</b>
                                <h3 class='ml-3 d-inline display-4 text-uppercase'>{{$client->first_name}}</h3>
                            </div>
                            <div class='col-sm-4 p-2 border border-top-0 border-bottom-0'><b>@lang('quickadmin.clients.fields.c-no')</b>
                                <h3 class='ml-3 d-inline display-4 text-uppercase'>{{$client->card_number}}</h3>
                            </div>
                        </div>
                        <div class='row border'>
                            <div class='col-sm-8 p-2 border border-top-0 border-bottom-0'><b>Address</b>
                                <h3 class='ml-3 d-inline display-4 text-uppercase'>{{$client->addr_line_1}} {{$client->addr_line_2}} {{$client->addr_city}}</h3></div>
                            <div class='col-sm-4'>
                                <div class='row'>
                                    <div class='col-sm-6 p-2 border border-top-0 border-bottom-0'><b>Age</b>
                                        <h3 class='ml-3 d-inline display-4 text-uppercase'></h3>
                                    </div>
                                    <div class='col-sm-6 p-2 border border-top-0 border-bottom-0'><b>Sex</b>
                                        <h3 class='ml-3 d-inline display-4 text-uppercase'>{{$client->gender->val_dsc}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row border'>
                            <div class='col-sm-8'>
                                <div class='row'>
                                    <div class='col-sm-8 p-2 border border-top-0 border-bottom-0'><b>Name of Next of Kin</b>
                                        <h3 class='ml-3 d-inline display-4 text-uppercase'>{{$client->nok_name}}</h3></div>
                                    <div class='col-sm-4 p-2 border border-top-0 border-bottom-0'>
                                        <b>Relationship</b>
                                        <h3 class='ml-3 d-inline display-4 text-uppercase'>{{$client->relative->val_dsc}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class='col-sm-4 p-2 border border-top-0 border-bottom-0'><b>Date of Birth</b>
                                <h3 class='ml-3 d-inline display-4 text-uppercase'>{{$client->dob}}</h3>
                            </div>
                        </div>
                        <div class='row border'>
                            <div class='col-sm-12 p-2 border border-top-0 border-bottom-0'><b>Address of Next of Kin</b>
                                <h3 class='ml-3 d-inline display-4 text-uppercase'>{{$client->nok_address}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#appointments" aria-controls="appointments" role="tab" data-toggle="tab">Appointments</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="appointments">
<table class="table table-bordered table-striped {{ count($appointments) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.appointments.fields.client')</th>
                        <th>@lang('quickadmin.clients.fields.phone')</th>
                        <th>@lang('quickadmin.clients.fields.email')</th>
                        <th>@lang('quickadmin.appointments.fields.employee')</th>
                        <th>@lang('quickadmin.appointments.fields.start-time')</th>
                        <th>@lang('quickadmin.appointments.fields.finish-time')</th>
                        <th>@lang('quickadmin.appointments.fields.comments')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($appointments) > 0)
            @foreach ($appointments as $appointment)
                <tr data-entry-id="{{ $appointment->id }}">
                    <td>{{ $appointment->client->first_name or '' }} {{ isset($appointment->client) ? $appointment->client->last_name : '' }}</td>
                    <td>{{ isset($appointment->client) ? $appointment->client->phone : '' }}</td>
                    <td>{{ isset($appointment->client) ? $appointment->client->email : '' }}</td>
                    <td>{{ $appointment->employee->first_name or '' }} {{ isset($appointment->employee) ? $appointment->employee->last_name : '' }}</td>
                    <td>{{ $appointment->start_time }}</td>
                    <td>{{ $appointment->finish_time }}</td>
                    <td>{!! $appointment->comments !!}</td>
                    <td>
                        @can('appointment_view')
                        <a href="{{ route('admin.appointments.show',[$appointment->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                        @endcan
                        @can('appointment_edit')
                        <a href="{{ route('admin.appointments.edit',[$appointment->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                        @endcan
                        @can('appointment_delete')
                        {!! Form::open(array(
                            'style' => 'display: inline-block;',
                            'method' => 'DELETE',
                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                            'route' => ['admin.appointments.destroy', $appointment->id])) !!}
                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.clients.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop