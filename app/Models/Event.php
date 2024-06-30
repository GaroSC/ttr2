<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    //Relacion uno a muchos inversa de eventos a usuarios
    public function post(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
