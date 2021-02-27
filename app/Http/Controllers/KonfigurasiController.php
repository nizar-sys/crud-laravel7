<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonfigurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // query dari store
        $setups = Setup::get();
        // tampil data
        return view('konfigurasi.setup', ['setups' => $setups]);
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
        $this->_validation($request);
        Setup::create($request->all());
        return redirect()->back()->with('message', 'Success adding fuild');
    }

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'jumlah_hari_kerja' => 'required|max:512',
                'nama_aplikasi' => 'required|max:256'
            ],
            [
                'jumlah_hari_kerja.required' => 'Jumlah hari kerja harus diisi',
                'nama_aplikasi.required' => 'nama aplikasi harus diisi',
            ]
        );
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
        $setup = Setup::find($id);
        return view('konfigurasi.setup-edit', ['setup' => $setup]);
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
        $this->_validation($request);
        Setup::where('id', $id)->update(['jumlah_hari_kerja' => $request->jumlah_hari_kerja, 'nama_aplikasi' => $request->nama_aplikasi]);
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
