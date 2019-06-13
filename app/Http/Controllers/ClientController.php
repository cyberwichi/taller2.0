<?php

namespace sisTaller\Http\Controllers;


use Illuminate\Http\Request;
use sisTaller\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sisTaller\Http\Requests\ClientFormRequest;
use Illuminate\Support\Facades\DB;
use sisTaller\Client;

class ClientController extends Controller
{
    public function __construct()
    { }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $clientes = DB::table('client')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orWhere('cif','LIKE', '%' . $query . '%')
                ->orWhere('telefono','LIKE', '%' . $query . '%')
                ->orWhere('direccion','LIKE', '%' . $query . '%')
                ->orderBy('client.idclient', 'desc')
                ->paginate(7);
            return view('client.index', ["clientes" => $clientes, "searchText" => $query]);
        }
    }
    public function create()
    {

        return view('client.create');
    }
    public function store(ClientFormRequest $request)
    {
        $cliente = new Client;
        $cliente->nombre = $request->get('nombreForm');
        $cliente->cif = $request->get('cifForm');
        $cliente->direccion = $request->get('direccionForm');
        $cliente->telefono = $request->get('telefonoForm');
        $cliente->save();
        return Redirect::to('client');
    }
    public function show($id)
    {
        return view("client.show", ["cliente" => Client::findOrFail($id)]);
    }

    public function edit($id)
    {

        return view('client.edit', ['cliente' => Client::findOrFail($id)]);
    }

    public function update(ClientFormRequest $request, $id)
    {
        $cliente = Client::findOrFail($id);
        $cliente->nombre = $request->get('nombreForm');
        $cliente->cif = $request->get('cifForm');
        $cliente->direccion = $request->get('direccionForm');
        $cliente->telefono = $request->get('telefonoForm');
        $cliente->update();
        return Redirect::to('client');
    }
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        $client->delete();
        return Redirect::to('client');
    }
}
