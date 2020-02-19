<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientMessageStoreRequest;
use App\Models\Client;
use App\Services\ClientMessageService;
use Yajra\DataTables\Facades\DataTables;

class ClientMessageController extends Controller
{
    public function table(Client $client)
    {
        $clientMessages = $client->messages()->select(['message', 'created_at']);

        return Datatables::of($clientMessages)
            ->make();
    }

    public function store(Client $client, ClientMessageStoreRequest $request)
    {
        $clientMessage = (new ClientMessageService())
            ->create($client, $request->validated());

        return redirect()->route('web.clients.show', ['client' => $client]);
    }
}
