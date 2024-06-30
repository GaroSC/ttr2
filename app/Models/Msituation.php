<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Msituation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * The users that belong to the MType
     *
     * @return BelongsToMany
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
