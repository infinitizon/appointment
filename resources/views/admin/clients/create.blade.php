@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clients.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.clients.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('card_number', 'Card Number', ['class' => 'control-label']) !!}
                    {!! Form::text('card_number', old('card_number'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('card_number'))
                        <p class="help-block">
                            {{ $errors->first('card_number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('first_name', 'First name', ['class' => 'control-label']) !!}
                    {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('first_name'))
                        <p class="help-block">
                            {{ $errors->first('first_name') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('last_name', 'Last name', ['class' => 'control-label']) !!}
                    {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('last_name'))
                        <p class="help-block">
                            {{ $errors->first('last_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
                    {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('dob', 'Date Of Birth', ['class' => 'control-label']) !!} 
                    {!! Form::text('dob', old('dob'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dob'))
                        <p class="help-block">
                            {{ $errors->first('dob') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('sex', 'Gender', ['class' => 'control-label']) !!}
                    <select id="sex" name="sex" class="form-control select2" required>
						<option value="">Please select</option>
						@foreach($genders as $gender)
							<option value="{{ $gender->id }}" {{ (old("sex") == $gender->id ? "selected":"") }}>{{ $gender->val_dsc }}</option>
						@endforeach
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('sex'))
                        <p class="help-block">
                            {{ $errors->first('sex') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('addr_line_1', 'Address Line 1', ['class' => 'control-label']) !!}
                    {!! Form::text('addr_line_1', old('addr_line_1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('addr_line_1'))
                        <p class="help-block">
                            {{ $errors->first('addr_line_1') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('addr_line_2', 'Address Line 2', ['class' => 'control-label']) !!}
                    {!! Form::text('addr_line_2', old('addr_line_2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('addr_line_2'))
                        <p class="help-block">
                            {{ $errors->first('addr_line_2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('addr_city', 'City', ['class' => 'control-label']) !!}
                    {!! Form::text('addr_city', old('addr_city'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('addr_city'))
                        <p class="help-block">
                            {{ $errors->first('addr_city') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('addr_country', 'Country', ['class' => 'control-label']) !!}
                    <select id="addr_country" name="addr_country" class="form-control select2" required>
						<option value="">Please select</option>
						@foreach($countries as $country)
							<option value="{{ $country->id }}" {{ (old("addr_country") == $country->id ? "selected":"") }}>{{ $country->val_dsc }}</option>
						@endforeach
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('addr_country'))
                        <p class="help-block">
                            {{ $errors->first('addr_country') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('addr_state', 'State', ['class' => 'control-label']) !!}
                    <select id="addr_state" name="addr_state" class="form-control select2" required>
						<option value="">Please select</option>
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('addr_state'))
                        <p class="help-block">
                            {{ $errors->first('addr_state') }}
                        </p>
                    @endif
                </div>
            </div>
            <fieldset>
                <legend>Next of Kin</legend>
                <div class="row">
                    <div class="col-xs-6 form-group">
                        {!! Form::label('nok_name', 'Name', ['class' => 'control-label']) !!}
                        {!! Form::text('nok_name', old('nok_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('nok_name'))
                            <p class="help-block">
                                {{ $errors->first('nok_name') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-6 form-group">
                        {!! Form::label('nok_relationship', 'Relationship', ['class' => 'control-label']) !!}
                        <select id="nok_relationship" name="nok_relationship" class="form-control select2" required>
                            <option value="">Please select</option>
                            @foreach($nok_relationships as $relationship)
                                <option value="{{ $relationship->id }}" {{ (old("nok_relationship") == $relationship->id ? "selected":"") }}>{{ $relationship->val_dsc }}</option>
                            @endforeach
                        </select>                        
                        <p class="help-block"></p>
                        @if($errors->has('nok_relationship'))
                            <p class="help-block">
                                {{ $errors->first('nok_relationship') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('nok_address', 'Address', ['class' => 'control-label']) !!}
                        {!! Form::text('nok_address', old('nok_address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('nok_address'))
                            <p class="help-block">
                                {{ $errors->first('nok_address') }}
                            </p>
                        @endif
                    </div>
                </div>
            </fieldset>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop
@section('javascript')
    @parent
	<script>
    $(document).ready(function () {
        $('#addr_country').on('change', function (e) {
            if($(this).val() != "") {
				$.ajax({
					url: '/admin/countries/'+$(this).val()+'/states',
					type: 'GET',
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					success:function(data){
                        var select = $('#addr_state');
                        select.empty();
						$.each(data,function(key, value) {
                            select.append('<option value="'+ value.id +'">'+ value.val_dsc +'</option>');
                        });
					}
				});
			}
        });
        $('.date').datepicker({
			autoclose: true,
			dateFormat: "{{ config('app.date_format_js') }}"
		})
    });
    </script>
@stop

