<?php

namespace App\Http\Controllers;

use App\GolonganDarah;
use Illuminate\Http\Request;

class GolonganDarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $darah = GolonganDarah::all();
        return view('kontaks.golongan-darah', compact('darah'));
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
        $darah = new GolonganDarah();
        $darah->goldarah = $request->darah;
        $darah->rhesus = $request->rhesus;
        $darah->save();
        return redirect('/golonganDarah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GolonganDarah  $golonganDarah
     * @return \Illuminate\Http\Response
     */
    public function show(GolonganDarah $golonganDarah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GolonganDarah  $golonganDarah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $darah =  GolonganDarah::find($id);
        return response()->json($darah);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GolonganDarah  $golonganDarah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GolonganDarah $golonganDarah)
    {
        $darah = GolonganDarah::find($request->iddarah);
        $darah->goldarah = $request->editDarah;
        $darah->rhesus = $request->editRhesus;
        $darah->update();
        return redirect('/golonganDarah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GolonganDarah  $golonganDarah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = GolonganDarah::find($id);
        $delete->delete();
        return redirect('/golonganDarah');
    }
}
