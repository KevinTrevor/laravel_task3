<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'currency'
    ];

    public function url(): BelongsTo
    {
        return $this->belongsTo(Url::class);
    }
}
