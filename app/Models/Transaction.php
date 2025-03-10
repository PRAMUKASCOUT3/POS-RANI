<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = [
        'code',
        'user_id',
        'member_id',
        'product_id',
        'date',
        'total_item',
        'subtotal',
        'amount_paid',
        'status'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function member():BelongsTo
    {
        return $this->belongsTo(Members::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function expenditure(): BelongsTo
    {
        return $this->belongsTo(Expenditure::class);
    }
    
}
