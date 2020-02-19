<?php

namespace App\Database\Schema;

use Illuminate\Database\Schema\Blueprint as BaseBlueprint;

class Blueprint extends BaseBlueprint
{
    public function int4range($column)
    {
        return $this->addColumn('int4range', $column);
    }
}
