<?php

namespace App\Http\Controllers;

use App\Models\UserDataBase;
use Illuminate\Http\Request;

class UserDataBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserDataBase::latest()->paginate(10);

        return view('user-data-base.index',compact('data'))
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
        self::

        UserDataBase::create($request->all());

        return redirect()->route('user-data-base.index')
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
        $dataBase = UserDataBase::find($id);
        $data = UserDataBase::latest()->paginate(10);

        return view('user-data-base.index',compact('data', 'userDataBase'))
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

        $userDataBase = UserDataBase::find($id);

        $userDataBase->update($request->all());

        $data = UserDataBase::latest()->paginate(10);

        return view('user-data-base.index',compact('data'))
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
        $userDataBase = UserDataBase::find($id);
        $userDataBase->delete();

        $data = UserDataBase::latest()->paginate(10);

        return view('user-data-base.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('success','Post deleted successfully');
    }

    protected function valida(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'senha' => 'required'
        ]);
    }
}
