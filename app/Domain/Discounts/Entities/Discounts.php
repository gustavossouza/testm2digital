<?php

namespace App\Domain\Discounts\Entities;

use App\Domain\Products\Entities\Products;
use Database\Factories\DiscountFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discounts extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'product_id',
        'campaign_id',
        'discount',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class);
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Products::class);
    }

    protected static function newFactory()
    {
        return DiscountFactory::new();
    }
}
