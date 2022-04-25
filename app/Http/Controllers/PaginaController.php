<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagina;

class PaginaController extends Controller
{
    public function index()
    {
        $edificios = Pagina::select('edificio')->distinct()->where('sede', 'Belenes')->where('edificio', 'like', 'Edificio%')->orderBy('edificio', 'asc')->get();
        return view('pagina.index', compact('edificios'));
    }

    public function buscador(Request $request)
    {

        if ($request->ajax()) {
            
            $consulta = Pagina::where('edificio', 'like', '%' . $request->buscador . '%')->orWhere('nombre', 'like', '%' . $request->buscador . '%')->paginate(5);
            //return $consulta;
            $termino = $request->buscador;

            return  view('pagina.busqueda', compact('termino', 'consulta'))->render();
        }
    }

    public function show($edificio)
    {

        $p_b = Pagina::select('id', 'nombre', 'titular', 'telefono', 'correo', 'horario')->distinct()->where('edificio', '=', $edificio)->where('sede', 'Belenes')->where('piso', 'Planta Baja')->get();
        $p_1 = Pagina::select('id', 'nombre', 'titular', 'telefono', 'correo', 'horario')->distinct()->where('edificio', '=', $edificio)->where('sede', 'Belenes')->where('piso', 'Piso 1')->get();
        $p_2 = Pagina::select('id', 'nombre', 'titular', 'telefono', 'correo', 'horario')->distinct()->where('edificio', '=', $edificio)->where('sede', 'Belenes')->where('piso', 'Piso 2')->get();
        $p_3 = Pagina::select('id', 'nombre', 'titular', 'telefono', 'correo', 'horario')->distinct()->where('edificio', '=', $edificio)->where('sede', 'Belenes')->where('piso', 'Piso 3')->get();
        $p_4 = Pagina::select('id', 'nombre', 'titular', 'telefono', 'correo', 'horario')->distinct()->where('edificio', '=', $edificio)->where('sede', 'Belenes')->where('piso', 'Piso 4')->get();
        $pisos = ['Planta Baja' => $p_b,'Piso 1' =>$p_1,'Piso 2' =>$p_2,'Piso 3' =>$p_3,'Piso 4' =>$p_4];
        $pisos = collect($pisos);
        $imagen = explode(' ', $edificio)[1];

        return view('pagina.show', compact('edificio', 'p_b', 'p_1', 'p_2', 'p_3', 'p_4','pisos', 'imagen'));
    }

    public function info($edificio, $info)
    {
        $consulta = Pagina::find($info);

        return view('pagina.info', compact('consulta'));
    }
}
