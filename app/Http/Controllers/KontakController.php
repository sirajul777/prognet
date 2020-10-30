<?php

namespace App\Http\Controllers;


use App\Kontak;
use App\GolonganDarah;
use App\Hobby;
use App\KontakHobby;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontak = Kontak::all();
        $darahid = GolonganDarah::all();
        $hobby = Hobby::all();
        return view('kontaks.kontak', ['kontak' => $kontak, 'darahid' => $darahid, 'hobby' => $hobby]);
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
        $kontak = new Kontak();
        $kontak->nama = $request->nama;
        $kontak->alamat = $request->alamat;
        $kontak->telepon = $request->telepon;
        $kontak->email = $request->email;
        $kontak->darahid = $request->golonganD;
        $kontak->save();
        $kh = new KontakHobby();
        $kh->kontakid = $kontak->id;
        $kh->hobbyid = $request->hobby;
        $kh->save();

        return redirect('/kontak');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function show($kontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editKontaks =  Kontak::find($id);
        return response()->json($editKontaks);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $kontak = Kontak::find($request->id);
        $kontak->nama = $request->nama;
        $kontak->alamat = $request->alamat;
        $kontak->telepon = $request->telepon;
        $kontak->email = $request->email;
        $kontak->darahid = $request->golonganD;
        $kontak->update();
        return redirect('/kontak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kontaks = Kontak::find($id);
        $kontaks->delete();
        return redirect('/kontak');
    }
}
