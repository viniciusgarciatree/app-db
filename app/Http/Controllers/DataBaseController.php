<?php

namespace App\Http\Controllers;

use App\Models\DataBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('data_base')->orderBy('descricao', 'asc')->paginate(100);

        return view('data-base.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $request->validate([
            'descricao' => 'required',
            'host' => 'required',
            'port' => 'required',
            'base' => 'required',
        ]);

        DataBase::create($request->all());

        return redirect()->route('data-base.index')
                        ->with('success','Post created successfully.');
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
        $dataBase = DataBase::find($id);
        $data = DataBase::latest()->paginate(10);

        return view('data-base.index',compact('data', 'dataBase'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $request->validate([
            'descricao' => 'required',
            'host' => 'required',
            'port' => 'required',
            'base' => 'required',
        ]);

        $dataBase = DataBase::find($id);

        $dataBase->update($request->all());

        $data = DataBase::latest()->paginate(10);

        return view('data-base.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataBase = DataBase::find($id);
        $dataBase->delete();

        $data = DataBase::latest()->paginate(10);

        return view('data-base.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('success','Post deleted successfully');
    }

    public function search(Request $request)
    {

    }
}
