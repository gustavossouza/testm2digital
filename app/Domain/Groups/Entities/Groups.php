<?php

namespace App\Domain\Groups\Entities;

use App\Domain\Campaigns\Entities\Campaigns;
use App\Domain\Cities\Entities\Cities;
use Database\Factories\GroupFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Groups extends Model
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
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(Cities::class, 'group_id');
    }

    public function campaign(): HasOne
    {
        return $this->hasOne(Campaigns::class, 'group_id');
    }

    protected static function newFactory()
    {
        return GroupFactory::new();
    }
}
