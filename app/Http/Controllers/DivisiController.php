<?php

namespace App\Http\Controllers;

use App\Helpers\siteHelpers;
use Illuminate\Http\Request;
use App\Models\Divisi;
use Illuminate\Support\Facades\Gate;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(siteHelpers::cek_akses());
        // $this->authorize('akses_divisi', Divisi::class);
        // query dari store
        // if (Gate::allows('akses')) {
        //     return redirect()->back();
        // }
        $data = Divisi::get();
        // tampil data
        return view('master-data.divisi', ['data' => $data]);
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
        Divisi::create($request->all());
        return redirect()->back()->with('message', 'Success adding fuild');
    }

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nama' => 'required|max:512',
            ],
            [
                'nama.required' => 'Devisi harus diisi',
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
        $divisi = Divisi::find($id);
        return view('master-data.divisi-edit', ['divisi' => $divisi]);
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
        Divisi::where('id', $id)->update(['nama' => $request->nama]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Divisi::destroy($id);
        return redirect('master-data/divisi')->with('message', 'Divisi has been deleted');
    }
}
