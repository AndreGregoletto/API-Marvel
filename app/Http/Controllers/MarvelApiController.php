<?php

namespace App\Http\Controllers;

use App\Http\Requests\Marvel\RequestCreate;
use App\Http\Requests\Marvel\RequestUpdate;
use App\Models\Marvel;
use Illuminate\Http\Request;

class MarvelApiController extends Controller
{
    public function getAllHq()
    {
        $hqs = Marvel::get();
        return response()->json($hqs, 200);
    }

    public function getHq($id)
    {
        if(Marvel::where('id', $id)->exists()){
            $hq = Marvel::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($hq, 200);
        }else{
            return response()->json(["message" => "Não encontrado"], 404);
        }
    }

    public function createHq(RequestCreate $request)
    {
        $hqs = $request->validated();
        Marvel::create($hqs);

        return response()->json(["message" => "Hq Criada com sucesso"], 201);
    }

    public function updateHq(RequestUpdate $request, $id)
    {
        if(isset($request)){
            $hqs = $request->validated();
            Marvel::where('id', $id)->update($hqs);

            return response()->json(["message" => "Dados atualizados com sucesso"], 200);
        }else{
            return response()->json(["message" => "HQ Not Found"], 404);
        }
    }

    public function deleteHq($id)
    {
        if(Marvel::where('id', $id)->exists()){
            $hq = Marvel::find($id);
            $hq->delete();

            return response()->json([
                "message" => "Hq deletada com sucesso"
            ], 202);
        }else{
            return response()->json([
                "message" => "HQ Not Found"
            ], 404);
        }
    }
}
