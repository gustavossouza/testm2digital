<?php

namespace App\Domain\Products\Entities;

use App\Domain\Campaigns\Entities\Campaigns;
use App\Domain\Discounts\Entities\Discounts;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Products extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'price',
        'campaign_id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaigns::class);
    }

    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discounts::class);
    }

    protected static function newFactory()
    {
        return ProductFactory::new();
    }
}
