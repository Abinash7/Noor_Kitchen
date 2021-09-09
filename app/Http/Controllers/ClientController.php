<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::all();
        return view('Backend.Clients.list')->with('clients', $client);
    }

    public function create()
    {
        return view('Backend.Clients.create');
    }

    public function store(Request $request)
    {
        Client::create($this->clientValidation($request->all()));
        return redirect()->route('client.index')->with('message', 'Client Created Succcessfully !!!');
    }

    public function edit(Client $client)
    {
        return view('Backend.Clients.edit')->with('clients', $client);
    }

    public function update(Request $request, Client $client)
    {
        $client->update($this->clientValidation($client->id));
        return redirect()->route('client.index')->with('message', 'Client Updated Succcessfully !!!');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index')->with('message', 'Client Deleted Succcessfully !!!');
    }

    private function clientValidation()
    {
        return request()->validate([
            'client_name' => 'required|string',
            'client_address' => 'required|string',
            'contact_number' => 'required|integer',
            'customer_vat' => 'required'
        ]);
    }
}
