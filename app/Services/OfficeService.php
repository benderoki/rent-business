<?php

namespace App\Services;

use App\Models\Office;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OfficeService
{
    public function create(array $data, User $user)
    {
        $company = DB::transaction(function () use ($data, $user) {
            $company = new Office();
            $company->fill($data);
            $company->save();

            $company->users()->attach($user);
            return $company;
        });

        return $company;
    }
}
