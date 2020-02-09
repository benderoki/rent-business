<?php

namespace App\Http\Controllers\Business;

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
        return view('business.offices.index');
    }

    public function table()
    {
        $users = Office::select(['name']);

        return Datatables::of($users)->make();
    }

    public function create()
    {
        return view('business.offices.create');
    }

    public function store(OfficeStoreRequest $request)
    {
        $office = (new OfficeService())->create($request->validated(), Auth::user());

        return redirect()->route('business.offices.index');
    }
}
