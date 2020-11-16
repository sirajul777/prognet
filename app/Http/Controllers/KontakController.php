<?php

namespace App\Http\Controllers;


use App\Kontak;
use App\GolonganDarah;
use App\Hobby;
use App\KontakHobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        foreach ($request->hobby as $hobby) {
            $kh = new KontakHobby();
            $kh->kontakid = $kontak->id;
            $kh->hobbyid = $hobby;
            $kh->save();
        }
        return redirect('/kontak');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kons = Kontak::find($id);
        foreach ($kons->hobby as $hobby) {
            $hobby->hobby;
        }
        return response()->json($kons);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hoy = KontakHobby::where('kontakid', $id)->pluck('hobbyid')->toArray();
        $editKontaks =  Kontak::find($id);
        $kontak = Kontak::all();
        $darahid = GolonganDarah::all();
        $hobby = Hobby::all();

        return view('kontaks.editkontakHoby', compact('editKontaks', 'kontak', 'darahid', 'hoy', 'hobby'));
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
        $kontak = Kontak::find($request->idkontaks);
        $kontak->nama = $request->ednama;
        $kontak->alamat = $request->alamat;
        $kontak->telepon = $request->telepon;
        $kontak->email = $request->email;
        $kontak->darahid = $request->golonganD;
        $kontak->update();

        KontakHobby::where('kontakid', $request->idkontaks)->delete();

        if (!empty($request->hobby)) {
            foreach ($request->hobby as $hobby) {
                $kh = new KontakHobby();
                $kh->kontakid = $kontak->id;
                $kh->hobbyid = $hobby;
                $kh->save();
            }
        }

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
