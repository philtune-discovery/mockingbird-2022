<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'project_id',
        'label',
        'path',
        'thumb_path',
        'pos',
        'user_id'
    ];

    public function project():BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getPathUrl()
    {
        return Storage::url($this->path);
    }

    public function getThumbPathUrl()
    {
        return Storage::url($this->thumb_path);
    }
}
