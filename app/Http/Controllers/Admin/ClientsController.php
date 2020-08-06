<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClientsRequest;
use App\Http\Requests\Admin\UpdateClientsRequest;

class ClientsController extends Controller
{
    /**
     * Display a listing of Client.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (! Gate::allows('client_access')) {
            return abort(401);
        }
        $filters = $request->q;
        if ($filters) {
            $client = Client::with(['country','state'])
                            ->where('card_number', 'like', '%' . $filters . '%')
                            ->orWhere('first_name', 'like', '%' .  $filters. '%')
                            ->orWhere('last_name', 'like', '%' .  $filters. '%')
                            ->orWhere('phone', 'like', '%' .  $filters. '%')
                            ->orWhere('email', 'like', '%' .  $filters. '%');
            return $client->paginate();
        }
        $clients = Client::all();

        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating new Client.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('client_create')) {
            return abort(401);
        }
        $relations = [
            'genders' => \App\Lov::where('def_id', '00-SEX')->get(),
            'countries' => \App\Lov::where('def_id', 'CTC-CTR')->get(),
            'nok_relationships' => \App\Lov::where('def_id', 'CTC-RLT')->get(),
        ];
        return view('admin.clients.create', $relations);
    }

    /**
     * Store a newly created Client in storage.
     *
     * @param  \App\Http\Requests\StoreClientsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientsRequest $request)
    {
        if (! Gate::allows('client_create')) {
            return abort(401);
        }
        // dd($request->all());
        $client = Client::create($request->all());
        
        return redirect()->route('admin.clients.index');
    }


    /**
     * Show the form for editing Client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('client_edit')) {
            return abort(401);
        }
        $client = Client::findOrFail($id);
        $relations = [
            'genders' => \App\Lov::where('def_id', '00-SEX')->get(),
            'countries' => \App\Lov::where('def_id', 'CTC-CTR')->get(),
            'nok_relationships' => \App\Lov::where('def_id', 'CTC-RLT')->get(),
            'states' => \App\Lov::where('par_id', $client->addr_country)->get(),
        ];
// return $client;
        return view('admin.clients.edit', compact('client')+$relations);
    }

    /**
     * Update Client in storage.
     *
     * @param  \App\Http\Requests\UpdateClientsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientsRequest $request, $id)
    {
        if (! Gate::allows('client_edit')) {
            return abort(401);
        }
        $client = Client::findOrFail($id);
        $client->update($request->all());



        return redirect()->route('admin.clients.index');
    }


    /**
     * Display Client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Client $client)
    {
        if (! Gate::allows('client_view')) {
            return abort(401);
        }
        $relations = [
            'appointments' => \App\Appointment::where('client_id', $client->id)->get(),
        ];
        if ($request->api) {
            return $client->load(['country', 'state', 'gender', 'nok_relationship']);
        }

        return view('admin.clients.show', compact('client') + $relations);
    }


    /**
     * Remove Client from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('client_delete')) {
            return abort(401);
        }
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('admin.clients.index');
    }

    /**
     * Delete all selected Client at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('client_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Client::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
