<?php

namespace App\Models;

use App\Observers\TransactionObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'amount',
        'details',
        'user_id',
    ];

    public static function booted()
    {
        parent::observe(TransactionObserver::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function commissions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Commission::class);
    }
}
