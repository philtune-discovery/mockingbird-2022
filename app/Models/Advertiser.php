<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertiser extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];
    /**
     * @var mixed
     */
    private $name;

    public function campaigns():BelongsToMany
    {
        return $this->belongsToMany(Campaign::class)
                    ->withTimestamps();
    }
}
