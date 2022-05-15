<?php

namespace App\Domain\Campaigns\Entities;

use App\Domain\Groups\Entities\Groups;
use App\Domain\Products\Entities\Products;
use Database\Factories\CampaignFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Campaigns extends Model
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
        'active',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function group(): HasOne
    {
        return $this->hasOne(Groups::class, 'campaign_id');
    }
    
    public function products(): HasMany
    {
        return $this->hasMany(Products::class, 'campaign_id');
    }

    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discounts::class);
    }

    protected static function newFactory()
    {
        return CampaignFactory::new();
    }
}
