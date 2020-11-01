<?php

namespace App\Http\Controllers;

use App\KontakHobby;
use App\Kontak;
use App\Hobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Test\VarDumperTestTrait;

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
        $kh = KontakHobby::all();

        return view('kontaks.kontakHobby', compact('k', 'h', 'kh'));
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
        $idKontak = KontakHobby::where('kontakid', '=', $idKreq)->first('kontakid');


        // request dari database
        //todo kontak ada
        if ($idKontak != null) {
            $hobby = KontakHobby::where('kontakid', '=', $idKreq)->where('hobbyid', '=', $idhreq)->select('hobbyid')->first('hobbyid');
            // ! jika hoby sudah di pilih
            if ($hobby != null) {
                return redirect('/kontak-hobbies');
            } else {
                $kh->kontakid = $idKreq;
                $kh->hobbyid = $idhreq;
                $kh->save();
                return redirect('/kontak-hobbies');
            }
        } else {
            // todo hobby tidak ada
            $kh->kontakid = $idKreq;
            $kh->hobbyid = $idhreq;
            $kh->save();
            return redirect('/kontak-hobbies');
        }
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
    public function edit(Request $id)
    {
        $editKontaks =  KontakHobby::where('kontakid', '=', $id)->get('hobbyid');
        return response()->json($editKontaks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KontakHobby  $kontakHobby
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $idKontak = Kontak::find($id);
        $getHobby = Kontak::all();
        $idreq = $request->idkh;

        // $req = $request->hobby . $idKontak->hobbyid;

        if ($idKontak) {
            if (!empty($request->input('isian'))) {
                $will_delete = [];
                $hobby_dell = [];
                foreach ($request->input('isian') as $key => $value) {
                    $hobby = KontakHobby::where('kontakid', '=', $id)->select('hobbyid')->get();
                    array_push($will_delete, $hobby);
                    dd($hobby);

                    foreach ($hobby as $key) {


                        return response()->json($key);
                    }


                    // array_push($will_delete, ['isian' => $value]);

                    // $hobby->delete();
                }
            }
            //
            //     
            //     $hobby = KontakHobby::where('kontakid', '=', $idKreq)->where('hobbyid', '=', $idKreq)->select('hobbyid')->first('hobbyid');
            //     if ($request->$idKreq == $hobby) {
            //         $hobby = KontakHobby::where('kontakid', '=', $idKreq)->where('hobbyid', '=', $idKreq)->select('hobbyid')->get('hobbyid');
            //         foreach ($hobby as $h) {
            //             echo "delete hobby " . $h->hobbyid;
            //         }
            //     }
            // }
        } else {
            echo "tidak ada kontak";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KontakHobby  $kontakHobby
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $kontakHobby)
    {
        $checked = $request->input('isian');
        foreach ($checked as $id => $value) {
            KontakHobby::where("id", ['isian' => $id])->delete(); //Assuming you have a Todo model. 
        }
        KontakHobby::whereIn($checked)->delete();
        return redirect('/kontak-hobbies');
    }
}
