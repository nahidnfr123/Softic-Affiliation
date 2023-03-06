<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function affiliateUser(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AffiliateUser::class);
    }

    public function transaction(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
}
