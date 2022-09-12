<?php

namespace App\Http\Controllers;

use App\Models\Marvel;
use Illuminate\Http\Request;

class MarvelApiController extends Controller
{
    public function getAllHq()
    {
        $hqs = Marvel::get()->toJson(JSON_PRETTY_PRINT);
        // dd('entrou');
        return response($hqs, 200);
    }

    public function getHq($id)
    {
        if(Marvel::where('id', $id)->exists()){
            $hq = Marvel::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($hq, 200);
        }else{
            return response()->json([
                "message" => "Não encontrado"
            ], 404);
        }
    }

    public function createHq(Request $request){
        $hq = new Marvel;
        $hq->title       = $request->title;
        $hq->description = $request->description;
        $hq->type        = $request->type;
        $hq->series      = $request->series;
        $hq->comics      = $request->comics;
        $hq->save();

        return response()->json([
            "message" => "Hq Criada com sucesso"
        ], 201);
    }

    public function updateHq(Request $request, $id)
    {
        if(Marvel::where('id', $id)->exists()){
            $hq = Marvel::find($id);
            $hq->title       = is_null($request->title) ? $hq->title : $request->title;
            $hq->description = is_null($request->description) ? $hq->description : $request->description;
            $hq->type        = is_null($request->type) ? $hq->type : $request->type;
            $hq->series      = is_null($request->series) ? $hq->series : $request->series;
            $hq->comics      = is_null($request->comics) ? $hq->comics : $request->comics;
            $hq->save();

            return response()->json([
                "message" => "Dados atualizados com sucesso"
            ], 200);
        }else{
            return response()->json([
                "message" => "Hq não encontrada"
            ], 404);
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
                "message" => "Hq não encontrada"
            ], 404);
        }
    }
}
