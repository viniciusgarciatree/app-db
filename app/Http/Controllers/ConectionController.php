<?php

namespace App\Http\Controllers;

use App\Services\ConectionService;
use Illuminate\Http\Request;

class ConectionController extends Controller
{
    public function testConection(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            try {
                $resturn = (new ConectionService())->testConection($data);
            } catch (\Throwable $e) {
                return response()->json(['success'=>'Error ' . $e->getMessage()]);
            }
            
            return response()->json(['success'=>'Valores recebidos.' . $resturn]);
            
        }

        return response()->json(['error'=>'Não é uma ajax!!!!']);
    }
}
