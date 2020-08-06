<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lov;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LovController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Lov::paginate();
        // return response()->json(['success'=>false,'message' => $lovs], 401);
        // return $lovs;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Lov  $lov
     * @return \Illuminate\Http\Response
     */
    public function show(Lov $lov)
    {
        return $lov;
        // return response()->json(['success'=>false,'message' => $res], 401);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Lov  $lov
     * @return \Illuminate\Http\Response
     */
    public function edit(Lov $lov)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Lov  $lov
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lov $lov)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Lov  $lov
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lov $lov)
    {
        //
    }

    /**
     * Get the country/states in a school.
     *
     * @param  \App\Model\Lov  $lov
     * @return \Illuminate\Http\Response
     */
    public function countries(Request $request, $id)
    {
        // dd($id);
        // dd($request->id);
        $lovs = Lov::where('def_id', ($request->id?'CTC-STA':'CTC-CTR'));
        if($request->id) {
            $lovs->where('par_id', $request->id);
        }
        return $lovs->get(['id','par_id','val_id','val_dsc']);
    }
    /**
     * Get the lovs of a school based on the type passed in.
     *
     * @param  \App\Model\Lov  $lov
     * @return \Illuminate\Http\Response
     */
    public function lovs(Request $request)
    {
        if($request->type == null) {
            return response()->json(['success'=>false,'message' => 'Lov Type is required'], 401);
        }
        return Lov::where('def_id', '=', $request->type)
                    ->get(['r_k','val_id','val_dsc']);
    }
}
