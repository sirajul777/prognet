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
    public function edit($id)
    {
        $edit =  KontakHobby::where('kontakid', '=', $id)->get('hobbyid');
        $idk = $id;
        $hobby = Hobby::where('id', '=', $edit);
        $kontak = Kontak::where('id', '=', $id)->get();
        $hobby_dell = [];
        foreach ($kontak as $h) {
            foreach ($h->hobby as $item) {
                array_push($hobby_dell,  $item->hobby);
            }
            // return response()->json($hobby_dell);
        }

        return view('kontaks.editkontakHoby', compact('edit', 'hobby_dell', 'idk'));
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

        // $idKontak = Kontak::find($id);
        // $getHobby = Kontak::all();
        // $idreq = $request->idkh;

        // // $req = $request->hobby . $idKontak->hobbyid;

        // if ($idKontak) {
        //     if (!empty($request->input('isian'))) {
        //         $will_delete = [];
        //         $hobby_dell = [];
        //         foreach ($request->input('isian') as $key => $value) {
        //             $hobby = KontakHobby::where('kontakid', '=', $id)->select('hobbyid')->get();
        //             array_push($will_delete, $hobby);
        //             dd($hobby);

        //             foreach ($hobby as $key) {


        //                 return response()->json($key);
        //             }


        //             // array_push($will_delete, ['isian' => $value]);

        //             // $hobby->delete();
        //         }
        //     }
        //     //
        //     //     
        //     //     $hobby = KontakHobby::where('kontakid', '=', $idKreq)->where('hobbyid', '=', $idKreq)->select('hobbyid')->first('hobbyid');
        //     //     if ($request->$idKreq == $hobby) {
        //     //         $hobby = KontakHobby::where('kontakid', '=', $idKreq)->where('hobbyid', '=', $idKreq)->select('hobbyid')->get('hobbyid');
        //     //         foreach ($hobby as $h) {
        //     //             echo "delete hobby " . $h->hobbyid;
        //     //         }
        //     //     }
        //     // }
        // } else {
        //     echo "tidak ada kontak";
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KontakHobby  $kontakHobby
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $k = Kontak::all();
        $h = Hobby::all();
        $kh = KontakHobby::all();
        $checked = $request->input('isian');
        // todo jika checklist ada
        if ($checked) {
            //! looping isi checkbox
            foreach ($checked as $selector) {
                $data = Hobby::where('hobby', '=', $selector)->select('id')->get();
                $idHobby = [];
                //todo mangambil isi data id hobby ke dalam variable array $idhobby
                foreach ($data as $d) {
                    // * mengirim id dari database ke dalam array
                    array_push($idHobby,  $d->id);
                }
                // ? jika array data id Hobby ada
                if ($idHobby) {
                    // !looping array $idHobby
                    foreach ($idHobby as $ho) {
                        $sel = KontakHobby::where('kontakid', '=', $request->idkonHob)->where('hobbyid', '=', $ho)->select('id')->get();
                        $idKontakHobby = [];
                        foreach ($sel as $s) {
                            array_push($idKontakHobby,  $s->id);
                        }
                        if ($idKontakHobby) {
                            foreach ($idKontakHobby as $idkh) {
                                KontakHobby::find($idkh)->delete();
                            }
                        }
                    }
                } else {
                    return redirect()->back();
                }
            }
        } else {
            return redirect()->back();
        }

        return view('kontaks.kontakHobby', compact('k', 'h', 'kh'));
    }
}
