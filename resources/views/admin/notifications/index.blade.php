@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.notifications.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped {{ count($appointments) > 0 ? 'datatable' : '' }} @can('notification_delete') dt-select @endcan">
                <thead>
                <tr>
                    @can('notification_delete')
                        <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>
                    @endcan

                    <th>@lang('quickadmin.clients.fields.first-name')</th>
                    <th>@lang('quickadmin.clients.fields.last-name')</th>
                    <th>@lang('quickadmin.clients.fields.phone')</th>
                    <th>@lang('quickadmin.clients.fields.email')</th>
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
                            @can('notification_delete')
                                <td></td>
                            @endcan

                            <td>{{ $appointment->client->first_name or '' }}</td>
                            <td>{{ isset($appointment->client) ? $appointment->client->last_name : '' }}</td>
                            <td>{{ isset($appointment->client) ? $appointment->client->phone : '' }}</td>
                            <td>{{ isset($appointment->client) ? $appointment->client->email : '' }}</td>
                            <td>{{ $appointment->start_time }}</td>
                            <td>{{ $appointment->finish_time }}</td>
                            <td>{!! $appointment->comments !!}</td>
                            <td>
                                @can('notification_view')
                                    <a href="{{ route('admin.notifications.notify',['type'=>1]) }}"
                                       class="btn btn-xs btn-primary js-notification" data-notification-id="{{$appointment->id}}">@lang('quickadmin.qa_sms')</a>
                                @endcan
                                @can('notification_view')
                                    <a href="{{ route('admin.appointments.show',['type'=>2]) }}"
                                       class="btn btn-xs btn-info js-notification" data-notification-id="{{$appointment->id}}">@lang('quickadmin.qa_email')</a>
                                @endcan
                                @can('notification_view')
                                    <a href="{{ route('admin.appointments.show',['type'=>3]) }}"
                                       class="btn btn-xs btn-warning js-notification" data-notification-id="{{$appointment->id}}">@lang('quickadmin.qa_sms_email')</a>
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
@stop

@section('javascript') 
    <script>
        @can('notification_delete')
        window.qa_sms = '{{ route('admin.notifications.notify', 1) }}';
        window.qa_email = '{{ route('admin.notifications.notify', 2) }}';
        window.qa_sms_email = '{{ route('admin.notifications.notify', 3) }}';
        @endcan


        $(document).on('click', '.js-notification', function () {
        if (confirm('Are you sure')) {
            var ids = [];

            // $(this).closest('.actions').siblings('.datatable, .ajaxTable').find('tbody tr.selected').each(function () {
            //     console.log("selected", $(this).data('entry-id'));
                ids.push($(this).data('notification-id'));
            // });

            $.ajax({
                method: 'POST',
                url: $(this).attr('href'),
                data: {
                    _token: _token,
                    ids: ids
                }
            }).done(function () {
                // location.reload();
            });
        }

        return false;
    });
    </script>
@endsection