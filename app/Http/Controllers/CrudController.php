<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\This;
use Reflector;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // query dari store
        $article = DB::table('tb_article')->paginate(10);
        // tampil data
        return view('dataCrud.crud', ['tb_article' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dataCrud.crudCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|max:15',
            'description' => 'required|max:256'
        ]);

        DB::insert('INSERT INTO tb_article (title, description ) values (?, ?)', [$request->title, $request->description]);
        return redirect()->route('crud.index')->with('message', 'Article has been added');
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

    private function _validation(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|max:15',
            'description' => 'required|max:256'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article =  DB::table('tb_article')->where('id', $id)->first();
        return view('dataCrud.crudEdit', ['article' => $article]);
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
        DB::table('tb_article')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('crud.index')->with('message', 'Article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_article')->where('id', $id)->delete();

        return redirect()->back()->with('message', 'Article has been deleted');;
    }
}
