<?php

namespace App\Http\Controllers;

use App\Models\DataBase;
use App\Models\UserDataBase;
use App\Services\LoadDataBase;
use App\Services\LoadDataBaseService;
use Illuminate\Http\Request;
use stdClass;

class TooslController extends Controller
{
    public function compareDataBase()
    {
        $objDataBases = DataBase::all();
        return view('tools.compare-data-base', compact('objDataBases'));
    }

    public function integridadeCampo()
    {
        return view('tools.integridade-campo');
    }

    public function loadDataBase(Request $request)
    {
        return view('tools.load-data-base');
    }

    public function loadDataBaseSave(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            foreach($data['bases'] as $value){
                $dataBase = DataBase::firstOrCreate([
                    'host' => $data['host'],
                    'port' => $data['port'],
                    'base' => $value['base']
                ]);

                $dataBase->descricao = $value['descricao'];
                $dataBase->save();
            }

            $userDataBase = UserDataBase::firstOrCreate([
                'nome' => $data['nome'],
                'senha' => $data['senha']
            ]);
        }
    }

    public function loadDataBaseLoad(Request $request)
    {
        $data = [];
        if ($request->ajax()) {
            $param = $request->all();
            $data = (new LoadDataBaseService((object)[
                'host' => $param['host'],
                'port' => $param['port'],
                'user' => $param['nome'],
                'password' => $param['senha'],
            ]))->getDataBases();
        }

        return $data;
    }
}
