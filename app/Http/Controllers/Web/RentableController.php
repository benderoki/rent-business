<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentableStoreRequest;
use App\Models\Rentable\Rentable;
use App\Models\Rentable\RentableTariff;
use App\Services\RentableService;
use Yajra\DataTables\Facades\DataTables;

class RentableController extends Controller
{
    public function index()
    {
        return view('rentables.index');
    }

    public function table()
    {
        $rentables = Rentable::select(['name']);

        return Datatables::of($rentables)->make();
    }

    public function create()
    {
        return view('rentables.create', [
            'tariffPeriodTypes' => RentableTariff::PERIOD_TYPES,
            'tariffBillTypes' => RentableTariff::BILL_TYPES,
        ]);
    }

    public function store(RentableStoreRequest $request)
    {
        (new RentableService())->create($request->validated());

        return redirect()->route('web.rentables.index');
    }
}
