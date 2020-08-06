@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.appointments.title')</h3>
    
    {!! Form::model($appointment, ['method' => 'PUT', 'route' => ['admin.appointments.update', $appointment->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('client_id', 'Client*', ['class' => 'control-label']) !!}
                    {!! Form::select('client_id', $clients, old('client_id'), ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('client_id'))
                        <p class="help-block">
                            {{ $errors->first('client_id') }}
                        </p>
                    @endif
					<div class="row">
						<div class="col-xs-12" id="client_detail_result">
						<div class='mr-5 mb-2 ml-5 align-top'>
							<div class='row border'>
								<div class='col-sm-4 p-2 border border-top-0 border-bottom-0'><b>Surname</b><h3 class='ml-3 d-inline display-4 text-uppercase'>{{$appointment->client->last_name}}</h3></div>
								<div class='col-sm-4 p-2 border border-top-0 border-bottom-0'><b>First Name</b><h3 class='ml-3 d-inline display-4 text-uppercase'>{{$appointment->client->first_name}}</h3></div>
								<div class='col-sm-4 p-2 border border-top-0 border-bottom-0'><b>Number</b><h3 class='ml-3 d-inline display-4 text-uppercase'>{{$appointment->client->card_number}}</h3></div>
							</div>
							<div class='row border'>
                                <div class='col-sm-8 p-2 border border-top-0 border-bottom-0'><b>Address</b>
                                    <h3 class='ml-3 d-inline display-4 text-uppercase'>{{$appointment->client->addr_line_1}} {{$appointment->client->addr_line_2}} {{$appointment->client->addr_city}}</h3></div>
								<div class='col-sm-4'>
									<div class='row'>
										<div class='col-sm-6 p-2 border border-top-0 border-bottom-0'><b>Age</b>
											<h3 class='ml-3 d-inline display-4 text-uppercase'></h3>
										</div>
										<div class='col-sm-6 p-2 border border-top-0 border-bottom-0'><b>Sex</b><h3 class='ml-3 d-inline display-4 text-uppercase'>{{$appointment->client->gender->val_dsc}}</h3></div>
									</div>
								</div>
							</div>
							<div class='row border'>
								<div class='col-sm-8'>
									<div class='row'>
										<div class='col-sm-8 p-2 border border-top-0 border-bottom-0'><b>Name of Next of Kin</b><h3 class='ml-3 d-inline display-4 text-uppercase'>{{$appointment->client->nok_name}}</h3></div>
										<div class='col-sm-4 p-2 border border-top-0 border-bottom-0'>
											<b>Relationship</b><h3 class='ml-3 d-inline display-4 text-uppercase'>{{$appointment->client->relative->val_dsc}}</h3>
										</div>
									</div>
								</div>
								<div class='col-sm-4 p-2 border border-top-0 border-bottom-0'><b>Date of Birth</b><h3 class='ml-3 d-inline display-4 text-uppercase'>{{$appointment->client->dob}}</h3></div>
							</div>
							<div class='row border'>
								<div class='col-sm-12 p-2 border border-top-0 border-bottom-0'><b>Address of Next of Kin</b><h3 class='ml-3 d-inline display-4 text-uppercase'>{{$appointment->client->nok_address}}</h3></div>
							</div>
						</div>
						</div>
					</div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('service_id', 'Clinic*', ['class' => 'control-label']) !!}
            
                    <select id="service_id" name="service_id" class="form-control select2" required>
						<option value="">Please select</option>
						@foreach($services as $service)
							<option value="{{ $service->id }}" data-price="{{ $service->price }}" {{ (old("service_id") == $service->id || $appointment->service_id == $service->id ? "selected":"") }}>{{ $service->name }}</option>
						@endforeach
					</select>
                    <p class="help-block"></p>
                    @if($errors->has('service_id'))
                        <p class="help-block">
                            {{ $errors->first('service_id') }}
                        </p>
                    @endif
					<input type="hidden" id="price" value="0">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('start_time', 'Start time*', ['class' => 'control-label']) !!}
                    {!! Form::text('start_time', old('start_time'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('start_time'))
                        <p class="help-block">
                            {{ $errors->first('start_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('finish_time', 'Finish time', ['class' => 'control-label']) !!}
                    {!! Form::text('finish_time', old('finish_time'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('finish_time'))
                        <p class="help-block">
                            {{ $errors->first('finish_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('comments', 'Comments', ['class' => 'control-label']) !!}
                    {!! Form::textarea('comments', old('comments'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('comments'))
                        <p class="help-block">
                            {{ $errors->first('comments') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss"
        });
$(document).ready(function () {
		$('#client_id').select2({
			ajax: {
				url: "{{route('admin.clients.index')}}",
				dataType: 'json',
				delay: 250,
				data: function (params) {
					return {
						q: params.term, // search term
						page: params.page
					};
				},
				processResults: function (data, params) {
					params.page = params.page || 1;
					return {
						results: data.data,
						pagination: {
							more: (params.page * 30) < data.total
						}
					};
				},
				cache: true
			},
			placeholder: 'Search for patient',
			minimumInputLength: 1,
			templateResult: formatRepo,
			templateSelection: formatRepoSelection
		}).on('change', function (e) {
			url = '{{ route("admin.clients.show",":id") }}';
			$('#client_detail_result').html('<div class="text-center" id="loading"><i class="fa fa-spinner fa-3x fa-spin"></i> Loading, Please wait...</div>');
			$.ajax({
					url: url.replace(':id',$(this).val()),
					type: 'GET',
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					data: {api:true},
					success:function(repo){
						birthday = new Date(repo.dob);
						var ageDifMs = Date.now() - birthday.getTime();
						var ageDate = new Date(ageDifMs); // miliseconds from epoch
						age =  Math.abs(ageDate.getUTCFullYear() - 1970);
						$patient = $(
						"<div class='mr-5 mb-2 ml-5 align-top'>" +
							"<div class='row border'>" +
								"<div class='col-sm-4 p-2 border border-top-0 border-bottom-0'><b>Surname</b><h3 class='ml-3 d-inline display-4 text-uppercase'>" +repo.last_name + "</h3></div>" +
								"<div class='col-sm-4 p-2 border border-top-0 border-bottom-0'><b>First Name</b><h3 class='ml-3 d-inline display-4 text-uppercase'>" +repo.first_name + "</h3></div>" +
								"<div class='col-sm-4 p-2 border border-top-0 border-bottom-0'><b>Number</b><h3 class='ml-3 d-inline display-4 text-uppercase'>" +repo.card_number + "</h3></div>" +
							"</div>" +
							"<div class='row border'>" +
								"<div class='col-sm-8 p-2 border border-top-0 border-bottom-0'><b>Address</b><h3 class='ml-3 d-inline display-4 text-uppercase'>"+repo.addr_line_1+", "+repo.addr_line_2+", "+repo.addr_city+", "+repo.state.val_dsc+", "+repo.country.val_dsc+"</h3></div>" +
								"<div class='col-sm-4'>" +
									"<div class='row'>" +
										"<div class='col-sm-6 p-2 border border-top-0 border-bottom-0'><b>Age</b><h3 class='ml-3 d-inline display-4 text-uppercase'>"+age+"</h3></div>"+
										"<div class='col-sm-6 p-2 border border-top-0 border-bottom-0'><b>Sex</b><h3 class='ml-3 d-inline display-4 text-uppercase'>"+repo.gender.val_dsc+"</h3></div>"+
									"</div>" +
								"</div>" +
							"</div>" +
							"<div class='row border'>" +
								"<div class='col-sm-8'>"+
									"<div class='row'>" +
										"<div class='col-sm-8 p-2 border border-top-0 border-bottom-0'><b>Name of Next of Kin</b><h3 class='ml-3 d-inline display-4 text-uppercase'>"+repo.nok_name+"</h3></div>"+
										"<div class='col-sm-4 p-2 border border-top-0 border-bottom-0'><b>Relationship</b><h3 class='ml-3 d-inline display-4 text-uppercase'>"+repo.nok_relationship.val_dsc+"</h3></div>"+
									"</div>" +
								"</div>" +
								"<div class='col-sm-4 p-2 border border-top-0 border-bottom-0'><b>Date of Birth</b><h3 class='ml-3 d-inline display-4 text-uppercase'>" +repo.dob+"</h3></div>"+
							"</div>" +
							"<div class='row border'>" +
								"<div class='col-sm-12 p-2 border border-top-0 border-bottom-0'><b>Address of Next of Kin</b><h3 class='ml-3 d-inline display-4 text-uppercase'>"+repo.nok_address+"</h3></div>"+
							"</div>" +
						"</div>"
						)
						$('#client_detail_result').html($patient)
					}
				});
        });
});
function formatRepo (repo) {
  if (repo.loading) {
    return repo.text;
  }

  var $container = $(
    "<div class='select2-result-client clearfix'>" +
      "<div class='row'>" +
	  	"<div class='col-sm-5'>" +
		  "<h4 class='select2-result-client__name'>"+repo.first_name+' '+repo.last_name+
		  	" <small class='select2-result-client__card_number'>("+repo.card_number+")</small>"+
		  "</h4>"+
		"</div>"+
	  	"<div class='col-sm-7'>" +
		  "<i class='fa fa-phone'></i> "+repo.phone+" &nbsp; &nbsp;<i class='fa fa-envelope-open-o'></i> "+repo.email+
		  "<br><i class='fa fa-address-card-o'></i> "+repo.addr_line_1+", "+repo.addr_line_2+", "+repo.addr_city+", "+repo.state.val_dsc+", "+repo.country.val_dsc+
		"</div>"+
	  "</div>" +
    "</div>"
  );
  return $container;
}
function formatRepoSelection (repo) {
	result_received =false
	repo.first_name||repo.last_name||repo.card_number? result_received =true : '';
  return result_received? repo.first_name+' '+repo.last_name +' ('+repo.card_number+')': repo.text;
}
    </script>

@stop