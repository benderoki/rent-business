<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;

class CompanyService
{
    public function create(array $data, Authenticatable $user)
    {
        return DB::transaction(function () use ($data, $user) {
            $company = new Company();
            $company->fill($data);
            $company->save();

            $user->company()->associate($company);
            $user->save();

            return $company;
        });
    }
}
