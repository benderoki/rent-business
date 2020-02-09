<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyStoreRequest;
use App\Services\CompanyService;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function create()
    {
        return view('business.companies.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        (new CompanyService())->create($request->validated(), Auth::user());

        return redirect()->route('business.home');
    }
}
