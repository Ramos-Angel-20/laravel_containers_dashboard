<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Scale;
use App\Models\Route;
use App\Models\Equipment;
use App\Models\Container;
use App\Models\Operators;
use App\Models\Unit;

class ScaleController extends Controller
{
    public function create(Request $request, $id)
    {        
        $route = Route::where('id', '=', $id)->first();

        // Traemos todos los contenedores asociados a esa ruta
        $containers = Container::where('id_ruta', '=', $route->id)->get();
        
        // Traemos el operador asociado a la ruta.
        $operator = Operators::where('id', '=', $route->id_operador)->first();

        //Traemos la unidad asociada a la ruta.
        $unit = Unit::where('id', '=', $route->id_unidad)->first();

        $equipment = Equipment::where('id_ruta', '=', $route->id)->get();

        return view('scales.create', compact('route', 'containers', 'operator', 'unit', 'equipment'));
    }

    public function store() 
    {

    }
}