<?php

namespace sisTaller\Http\Controllers;
use Illuminate\Http\Request;
use sisTaller\Car;
use sisTaller\Http\Requests;
use sisTaller\Reparation;
use Illuminate\Support\Facades\Redirect;
use sisTaller\Http\Requests\CarFormRequest;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function __construct()
    { }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $cars = DB::table('car')
                ->where('matricula', 'LIKE', '%' . $query . '%')
                ->join('client as cl','car.idclient','=','cl.idclient')
                ->orWhere('cl.nombre','LIKE', '%' . $query . '%')
                ->orWhere('cl.cif','LIKE', '%' . $query . '%')
                ->orWhere('modelo','LIKE', '%' . $query . '%')
                ->orderBy('car.idclient', 'desc')
                ->paginate(7);
            return view('car.index', ["cars" => $cars, "searchText" => $query]);
        }
    }
    public function create()
    {
        $clientes=DB::table('client')->get();
        return view('car.create',['clientes'=> $clientes]);
    }
    public function store(CarFormRequest $request)
    {
        $car = new Car;

        $car->idclient = $request->get('idclientForm');
        $car->matricula = $request->get('matriculaForm');
        $car->modelo = $request->get('modeloForm');
        $car->save();
        return Redirect::to('car');
    }
    public function show($id)
    {
        return view("car.show", ["car" => Car::findOrFail($id)]);
    }

    public function edit($id)
    {
        $clientes=DB::table('client')->get();
        return view('car.edit', ['car' => Car::findOrFail($id), 'clientes'=>$clientes]);
    }

    public function update(CarFormRequest $request,$id)
    {
        $car=Car::findOrFail($id);
        $car->idclient = $request->get('idclientForm');
        $car->matricula = $request->get('matriculaForm');
        $car->modelo = $request->get('modeloForm');
        $car->update();
        return Redirect::to('car');
     }
    public function destroy($idcar)
    {
        $car=Car::findOrFail($idcar);

        $car->delete();
        return Redirect::to('car');
    }
}
