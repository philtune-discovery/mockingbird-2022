<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    use HasFactory;

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
