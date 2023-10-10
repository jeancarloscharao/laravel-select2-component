<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Cidade;
use App\Models\Bairro;

class Select2Controller extends Controller
{
    public function getOptions(Request $request, $id = null)
    {

        if ($id) {
            return response()->json(['id' => $id, 'text' => 'Opção ' . $id]);
        }


        $search = $request->input('search');
        $page = $request->input('page', 1);


        $data = [
            ['id' => '1', 'text' => 'Opção 1'],
            ['id' => '2', 'text' => 'Opção 2'],
            ['id' => '3', 'text' => 'Opção 3'],
        ];


        if ($search) {
            $data = array_filter($data, function ($item) use ($search) {
                return stripos($item['text'], $search) !== false;
            });
        }


        return response()->json(['items' => array_values($data)]);
    }


    public function getOptionsEstados(Request $request, $id = null)
    {

        $id = $request->input('id', $id);
        $search = $request->input('search');

        $data = Estado::orderBy('estado', 'asc')
        ->when($id, function ($query, $id) {
            return $query->where('id', $id);
        })
        ->when($search, function ($query, $search) {
            return $query->where('estado', 'like', '%' . $search . '%');
        })
        ->get()
        ->map(function ($estado) {
            return ['id' => (string) $estado->id, 'text' => $estado->estado];
        })->all();

        return response()->json(['items' => array_values($data)]);
    }

    public function getOptionsCidades(Request $request, $id = null)
    {
        $id = $request->input('id', $id);
        $auxId = $request->input('auxId');
        $search = $request->input('search');

        $data = Cidade::orderBy('cidade', 'asc')
            ->when($id, function ($query, $id) {
                return $query->where('id', $id);
            })
            ->when($auxId, function ($query, $auxId) {
                return $query->where('estado_id', $auxId);
            })
            ->when($search, function ($query, $search) {
                return $query->where('cidade', 'like', '%' . $search . '%');
            })
            ->get()
            ->map(function ($cidade) {
                return ['id' => (string) $cidade->id, 'text' => $cidade->cidade];
            })
            ->all();

        return response()->json(['items' => array_values($data)]);
    }


    public function getOptionsBairros(Request $request, $id = null)
    {

        $id = $request->input('id', $id);
        $auxId = $request->input('auxId');
        $search = $request->input('search');

        $data = Bairro::orderBy('bairro', 'asc')
            ->when($id, function ($query, $id) {
                return $query->where('id', $id);
            })
            ->when($auxId, function ($query, $auxId) {
                return $query->where('cidade_id', $auxId);
            })
            ->when($search, function ($query, $search) {
                return $query->where('bairro', 'like', '%' . $search . '%');
            })
            ->get()
            ->map(function ($bairro) {
                return ['id' => (string) $bairro->id, 'text' => $bairro->bairro];
            })
            ->all();

        return response()->json(['items' => array_values($data)]);
    }

}
