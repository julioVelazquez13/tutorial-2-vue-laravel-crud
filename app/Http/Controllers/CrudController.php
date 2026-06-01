<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CrudController extends Controller
{
    public function index()
    {
        return response(Crud::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function create()
    {
        $crud = Crud::create([
            'name' => 'Registro ' . rand(1, 1000),
'color' => rand(0,1) ? 'red' : 'green',
        ]);

        return response($crud->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function update(Request $request, Crud $crud)
    {
        $crud->update([
            'color' => $request->color,
        ]);

        return response(null, Response::HTTP_OK);
    }

    public function destroy(Crud $crud)
    {
        $crud->delete();

        return response(null, Response::HTTP_OK);
    }
}
