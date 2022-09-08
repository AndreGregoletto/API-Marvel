<?php

namespace App\Http\Controllers;

use App\Models\Marvel;
use Illuminate\Http\Request;

class MarvelApiController extends Controller
{
    public function getAllHq()
    {
        $hqs = Marvel::get()->toJson(JSON_PRETTY_PRINT);
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

}
