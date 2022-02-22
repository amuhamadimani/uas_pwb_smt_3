<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stok;
use App\Distribusi;

class LogistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stok()
    {
        $data = Stok::all();
        $jumlah_lks = Stok::all()->sum('jumlah');
        $total_persediaan = Stok::all()->sum('nilai_persediaan');

        return view("stok.stok", compact('data', 'jumlah_lks', 'total_persediaan'));
    }

    public function stokStore(Request $request)
    {
        $validatedData = $request->validate([
            'id_kelas' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        $validatedData['nilai_persediaan'] = $request->harga * $request->jumlah;
        $show = Stok::create($validatedData);

        return redirect('/stok')->with('success', 'Stok Berhasil Diinput!');
    }

    public function stokEdit($id)
    {
        $data = Stok::all();
        $edit = Stok::findOrFail($id);

        return view("stok.stok-edit", compact('data', 'edit'));
    }

    public function stokUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_kelas' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);
        $validatedData['nilai_persediaan'] = $request->harga * $request->jumlah;
        Stok::whereId($id)->update($validatedData);

        return redirect('/')->with('success', 'Stok Berhasil Terupdate!');
    }

    public function stokDestroy($id)
    {
        $stok = Stok::findOrFail($id);
        $stok->delete();

        return redirect('/')->with('success', 'Stok Telah Terhapus!');
    }


    
    public function distribusi()
    {
        $data = Distribusi::all();
        return view("distribusi.distribusi", compact('data'));
    }

    public function distribusiStore(Request $request)
    {
        $jml_stok = Stok::where(['id_kelas' => $request->kelas])->first();
        $validatedData = $request->validate([
            'nama_sekolah' => 'required',
            'kelas' => 'required',
            'jumlah' => 'required',
        ]);
        $show = Distribusi::create($validatedData);

        $jml_stok->jumlah = $jml_stok->jumlah - $request->jumlah; 
        $jml_stok->save();

        return redirect('/distribusi')->with('success', 'Distribusi Berhasil Diinput!');
    }

    public function distribusiEdit($id)
    {
        $data = Distribusi::all();
        $edit = Distribusi::findOrFail($id);

        return view("distribusi.distribusi-edit", compact('data', 'edit'));
    }

    public function distribusiUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_sekolah' => 'required',
            'kelas' => 'required',
            'jumlah' => 'required',
        ]);

        Distribusi::whereId($id)->update($validatedData);

        return redirect('/distribusi')->with('success', 'Distribusi Berhasil Terupdate!');
    }

    public function distribusiDestroy($id)
    {
        $distribusi = Distribusi::findOrFail($id);
        $distribusi->delete();

        return redirect('/distribusi')->with('success', 'Distribusi Telah Terhapus!');
    }

    public function cekStok()
    {
        $stok = Stok::all();

        return view("cek-stok", compact('stok'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
