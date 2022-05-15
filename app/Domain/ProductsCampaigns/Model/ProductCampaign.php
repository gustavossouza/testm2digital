<?php

namespace App\Domain\ProductCampaign;

use App\Domain\Campaigns\Entities\Campaigns;
use App\Domain\Products\Entities\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCampaign extends Model
{
    public $model = "product_campaign";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'campaign_id',
        'product_id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Products::class, 'product_id');
    }

    public function campaigns(): HasMany
    {
        return $this->hasMany(Campaigns::class, 'campaign_id');
    }
}