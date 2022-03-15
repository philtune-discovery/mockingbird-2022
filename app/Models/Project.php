<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;
use Spatie\Tags\Tag;

/**
 * @method static Builder withAdvertiser(Tag $tag) see scopeWithAdvertiser()
 * @method static Builder withAnyTags(array|\ArrayAccess|\Spatie\Tags\Tag $tags, string $type = null)
 */
class Project extends Model
{
    use SoftDeletes;
    use HasTags;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function scopeWithAdvertiser(Builder $query, Tag $tag):Builder
    {
        return self::withAnyTags($tag->name, 'advertiser');
    }

    public function campaign():BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images():HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function deliverables():HasMany
    {
        return $this->hasMany(Deliverable::class);
    }
}
