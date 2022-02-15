<?php

namespace App\Http\Controllers;

use App\Models\UserDataBase;
use Illuminate\Http\Request;

class UserDataBaseController extends Controller
{

    private $objUserDataBase;
    private $entUserDataBase;

    public function __construct(UserDataBase $objUserDataBase){
        $this->objUserDataBase = $objUserDataBase;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->paginacao();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->valida($request);

        $this->objUserDataBase::create($request->all());

        return $this->paginacao();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->entUserDataBase = $this->objUserDataBase::find($id);
        return $this->paginacao();
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
        $this->valida($request);

        ($this->objUserDataBase::find($id))->update($request->all());

        return $this->paginacao();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ($this->objUserDataBase::find($id))->delete();
        return $this->paginacao();
    }

    /**
     * Faz validação do request
     */
    protected function valida(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'senha' => 'required'
        ]);
    }

    /**
     * Paginação da aplicação
     * @return \Illuminate\Http\Response
     */
    protected function paginacao()
    {
        $entUserDataBase = $this->entUserDataBase;
        $data = UserDataBase::latest()->paginate(10);
        return view('user-data-base.index',compact('data', 'entUserDataBase'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
