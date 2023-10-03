<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $client = new Client();
        return $client->all(); 
    }

    public function create(Request $request)
    {
        $client = new Client();
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->address = $request->address;
        $client->save();
        return $client;
    }

    public function show($id)
    {
        $client = new Client();
        return $client->find($id);
    }

    public function update($id, Request $request)
    {
        $client = Client::find($id);
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->address = $request->address;
        $client->save();
        return $client;
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return $client;
    }
}
