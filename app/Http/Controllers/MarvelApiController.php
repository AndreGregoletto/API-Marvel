<?php

namespace App\Http\Controllers;

use App\Http\Requests\Marvel\RequestCreate;
use App\Http\Requests\Marvel\RequestUpdate;
use App\Models\Marvel;

class MarvelApiController extends Controller
{
    public function getAll()
    {
        $hqs = Marvel::get();
        return response()->json($hqs, 200);
    }

    public function getOne($id)
    {
        $hq = Marvel::where('id', $id)->get();
        return response()->json($hq, 200);
    }

    public function create(RequestCreate $request)
    {
        Marvel::create($request->validated());
        return response()->json(["message" => "Hq Criada com sucesso"], 201);
    }

    public function update(RequestUpdate $request, $id)
    {
        Marvel::where('id', $id)->updated($request->validated());
        return response()->json(["message" => "Dados atualizados com sucesso"], 200);
    }

    public function delete($id)
    {
        Marvel::find($id)->delete();
        return response()->json(["message" => "Hq deletada com sucesso"], 202);
    }
}