<?php

namespace App\Http\Controllers;

use App\KontakHobby;
use App\Kontak;
use App\Hobby;
use Illuminate\Http\Request;

class KontakHobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $k = Kontak::all();
        $h = Hobby::all();

        return view('kontaks.kontakHobby', compact('k', 'h'));
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
        $kh = new KontakHobby();

        // request dari form
        $idKreq = $request->idkonHob;
        $idhreq = $request->hobby;
        $idKontak = KontakHobby::where('kontakid', $idKreq)->get();
        $idHobby = KontakHobby::where('hobbyid', '=', $idhreq)->get();

        // request dari database
        if (!$idKontak) {
            if ($idHobby) {
                $kh->kontakid = $idKreq;
                $kh->hobbyid = $idhreq;
                $kh->save();
            } else {
                echo "hobby sudah terdaftar";
            }
        } else {
            echo "kontak tidak terdaftar";
        }

        return redirect('/kontak-hobbies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KontakHobby  $kontakHobby
     * @return \Illuminate\Http\Response
     */
    public function show(KontakHobby $kontakHobby)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KontakHobby  $kontakHobby
     * @return \Illuminate\Http\Response
     */
    public function edit(KontakHobby $kontakHobby)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KontakHobby  $kontakHobby
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KontakHobby $kontakHobby)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KontakHobby  $kontakHobby
     * @return \Illuminate\Http\Response
     */
    public function destroy(KontakHobby $kontakHobby)
    {
        //
    }
}
