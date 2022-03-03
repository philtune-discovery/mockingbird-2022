<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function advertisers():BelongsToMany
    {
        return $this->belongsToMany(Advertiser::class)
                    ->withTimestamps();
    }

    public function projects():HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function images():HasManyThrough
    {
        return $this->hasManyThrough(Image::class, Project::class);
    }
}
