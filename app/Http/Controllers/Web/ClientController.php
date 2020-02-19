<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use App\Models\Client;
use App\Services\ClientService;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index');
    }

    public function table()
    {
        $clients = Client::select(['id', 'name', 'phone', 'created_at']);

        return Datatables::of($clients)
            ->addColumn('actions', function (Client $client) {
                return view('clients.actions', ['client' => $client]);
            })
            ->make();
    }

    public function show(Client $client)
    {
        return view('clients.show', [
           'client' => $client,
        ]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientStoreRequest $request)
    {
        $office = (new ClientService())->create($request->validated());

        return redirect()->route('web.clients.index');
    }
}
