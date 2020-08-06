@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.appointments.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.appointments.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
					{!! Form::label('client_id', 'Patient*', ['class' => 'control-label']) !!}
					{!! Form::select('client_id', $clients, old('client_id'), ['class' => 'form-control', 'required' => '']) !!}

					<!-- <select id="client_id" name="client_id" class="form-control" required></select> -->
					<p class="help-block"></p>
                    @if($errors->has('client_id'))
                        <p class="help-block">
                            {{ $errors->first('client_id') }}
                        </p>
                    @endif
					<div class="row">
						<div class="col-xs-12" id="client_detail_result">
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
							<option value="{{ $service->id }}" data-price="{{ $service->price }}" {{ (old("service_id") == $service->id ? "selected":"") }}>{{ $service->name }}</option>
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
                    {!! Form::label('date', 'Date*', ['class' => 'control-label']) !!}
                    {!! Form::text('date', old('date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
					{!! Form::label('start_time', 'Start time*', ['class' => 'control-label']) !!}
                    {!! Form::text('start_time', old('start_time'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('start_time'))
                        <p class="help-block">
                            {{ $errors->first('start_time') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
					{!! Form::label('finish_time', 'Finish time*', ['class' => 'control-label']) !!}
                    {!! Form::text('finish_time', old('finish_time'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('finish_time'))
                        <p class="help-block">
                            {{ $errors->first('finish_time') }}
                        </p>
                    @endif
                </div>
            </div>
			<hr />
			<div id="results" style="display: none;">
			<p class="total_time"><strong>Total time: <span id="time">0</span> hour(s)</strong></p>
			<p class="total_price"><strong>Total price: $<span id="price_total">0</span></strong></p>
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

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss"
        });
    $('.timepicker').datetimepicker({
        autoclose: true,
        timeFormat: "HH:mm:ss",
        timeOnly: true
    });
    </script>
	<script>
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
		$('.date').datepicker({
			autoclose: true,
			dateFormat: "{{ config('app.date_format_js') }}"
		}).datepicker("setDate", "0");
		// $("#service_id").on("change", function() {
		// 	$("#price").val($('option:selected', this).attr('data-price'));
		// 	var date = $("#date").val();
		// 	var service_id = $("#service_id").val();
		// 	UpdateEmployees(service_id, date);
		// });
	
		// $("#date").change(function() {
		// 	var service_id = $("#service_id").val();
		// 	var date = $("#date").val();
		// 	UpdateEmployees(service_id, date);
		// });
		
		$("#starting_hour, #finish_hour, #starting_minute, #finish_minute").on("change", function () {
			CountPrice();		
		});
		
		$('body').on("change", "input[type=radio][name=employee_id]", function() {
			var employee_id = $(this).val();
			var starting_hour = parseInt($(".starting_hour_"+employee_id).text());
			var starting_minute = $(".starting_minute_"+employee_id).text();
			var finish_hour = starting_hour+1;
			if(finish_hour < 10) {
				finish_hour = "0"+finish_hour;
			}
			if(starting_hour < 10) {
				starting_hour = "0"+starting_hour;
			}
			// $('#starting_hour option[value='+starting_hour+']').prop('selected','true');
			// $('#starting_minute option[value='+starting_minute+']').prop('selected','true');
			// $('#finish_hour option[value='+finish_hour+']').prop('selected','true');
			// $('#finish_minute option[value='+starting_minute+']').prop('selected','true');
			// $("#start_time, #finish_time").show();
			// CountPrice();
		});
		
		function CountPrice() {
			var start_hour = parseInt($("#starting_hour").val());
			var start_minutes = parseInt($("#starting_minute").val());
			var finish_hour = parseInt($("#finish_hour").val());
			var finish_minutes = parseInt($("#finish_minute").val());
			var total_hours = (((finish_hour*60+finish_minutes)-(start_hour*60+start_minutes))/60);
			var price = parseFloat($("#price").val());
			$("#price_total").html(price*total_hours);
			$("#time").html(total_hours);
			if(start_hour != -1 && start_minutes != -1 && finish_hour != -1 && finish_minutes != -1) {
				$("#results").show();
			}
		}
		
		function UpdateEmployees(service_id, date)
		{
			if(service_id != "" && date != "") {
				$.ajax({
					url: '{{ url("admin/get-employees") }}',
					type: 'GET',
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					data: {service_id:service_id, date:date},
					success:function(option){
						//alert(option);
						$(".employees").remove();
						$("#date").closest(".row").after(option);
						$("#start_time, #finish_time").hide();
						$("#results").hide();
					}
				});
			}
		}
	</script>

@stop