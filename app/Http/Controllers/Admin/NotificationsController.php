<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Appointment;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('notification_access')) {
            return abort(401);
        }
        $date = date('Y-m-d');
        $appointments = Appointment::where('start_time', '>', date('Y-m-d'))->get();

        return view('admin.notifications.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('notification_create')) {
            return abort(401);
        }
        return view('admin.notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (! Gate::allows('notification_create')) {
        //     return abort(401);
        // }
        // $notification = notification::create($request->all());



        // return redirect()->route('admin.notifications.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if (! Gate::allows('notification_view')) {
        //     return abort(401);
        // }
        // $notification = notification::findOrFail($id);
        // return view('admin.notifications.show', compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd('Got here');
        // if (! Gate::allows('notification_view')) {
        //     return abort(401);
        // }
        // $notification = notification::findOrFail($id);
        // return view('admin.notifications.edit', compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if (! Gate::allows('notification_edit')) {
        //     return abort(401);
        // }
        // $notification = notification::findOrFail($id);
        // $notification->update($request->all());

        // return redirect()->route('admin.notifications.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (! Gate::allows('notification_delete')) {
        //     return abort(401);
        // }
        // $notification = notification::findOrFail($id);
        // $notification->delete();

        // return redirect()->route('admin.notifications.index');
    }
	
	public function notify(Request $request, $type)
    {
        if (! Gate::allows('notification_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Appointment::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $msg = "Dear " . $entry->client->first_name;
                $msg .= "\nDo not forget your appointment at " .$entry->service->name;
                $msg .= " on " .date('D, d M', strtotime($entry->start_time));
                $msg .= " between " .date('h:i a', strtotime($entry->start_time)) ;
                $msg .= " and " .date('h:i a', strtotime($entry->end_time)) ;

                if($type == 1) {
                    $entry->client->sendSMS($msg);
                }
                if($type == 2) {
                    $entry->client->sendEmail($msg);
                }
                if($type == 3) {
                    $entry->client->sendSMS($msg);
                    $entry->client->sendEmail($msg);
                }
            }
        }
    }
}
