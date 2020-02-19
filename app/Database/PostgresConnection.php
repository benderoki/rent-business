<?php

namespace App\Database;

use Illuminate\Database\PostgresConnection as BasePostgresConnection;
use App\Database\Schema\Grammars\PostgresGrammar;

class PostgresConnection extends BasePostgresConnection
{
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new PostgresGrammar);
    }
}
