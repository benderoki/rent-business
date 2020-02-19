<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientMessage extends Model
{
    protected $fillable = [
        'message',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
