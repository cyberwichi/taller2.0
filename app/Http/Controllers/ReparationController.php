<?php

namespace sisTaller\Http\Controllers;

use Illuminate\Http\Request;
use sisTaller\Http\Requests;
use sisTaller\Reparation;
use sisTaller\Car;
use Illuminate\Support\Facades\Redirect;
use sisTaller\Http\Requests\ReparationFormRequest;
use Illuminate\Support\Facades\DB;


class ReparationController extends Controller
{
    public function __construct()
    { }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $reparations = DB::table('reparation as r')->join('car as c','r.idcar','=','c.idcar')
                ->where('desrepara', 'LIKE', '%' . $query . '%')
                ->orWhere('c.matricula','LIKE', '%' . $query . '%')
                ->orWhere('fecha','LIKE', '%' . $query . '%')
                ->orderBy('r.idcar', 'desc')
                ->paginate(7);
            return view('reparation.index', ["reparations" => $reparations, "searchText" => $query]);
        }
    }
    public function create()
    {
        $matriculas=DB::table('car')->get();
        return view('reparation.create',['matriculas'=>$matriculas]);
    }
    public function store(ReparationFormRequest $request)
    {
        $reparation = new Reparation;
        $reparation->idcar = $request->get('idcarForm');
        $reparation->desrepara = $request->get('desreparaForm');
        $reparation->fecha = $request->get('fechaForm');
        $reparation->kilometros = $request->get('kilometrosForm');
        $reparation->save();
        return Redirect::to('reparation');
    }
    public function show($id)
    {
        return view("reparation.show", ["reparation" => Reparation::findOrFail($id)]);
    }

    public function edit($id)
    {
        $matriculas=DB::table('car')->get();
        return view('reparation.edit', ['reparation' => Reparation::findOrFail($id),'matriculas'=>$matriculas]);
    }

    public function update(ReparationFormRequest $request,$id)
    {
        $reparation=Reparation::findOrFail($id);
        $reparation->idcar = $request->get('idcarForm');
        $reparation->desrepara = $request->get('desreparaForm');
        $reparation->fecha = $request->get('fechaForm');
        $reparation->kilometros = $request->get('kilometrosForm');
        $reparation->update();
        return Redirect::to('reparation');
     }
    public function destroy($idreparation)
    {
        $reparation=Reparation::findOrFail($idreparation);

        $reparation->delete();
        return Redirect::to('reparation');
    }
}
