<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfficeStoreRequest;
use App\Models\Office;
use App\Services\OfficeService;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class OfficeController extends Controller
{
    public function index()
    {
        return view('offices.index');
    }

    public function table()
    {
        $users = Office::select(['name']);

        return Datatables::of($users)->make();
    }

    public function create()
    {
        return view('offices.create');
    }

    public function store(OfficeStoreRequest $request)
    {
        $office = (new OfficeService())->create($request->validated(), Auth::user());

        return redirect()->route('web.offices.index');
    }
}
