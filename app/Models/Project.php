<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Project extends Model
{
    use SoftDeletes;
    use HasTags;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function campaign():BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function images():HasMany
    {
        return $this->hasMany(Image::class);
    }
}
