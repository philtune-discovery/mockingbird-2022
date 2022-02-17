<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Image extends Model implements Sortable
{
    use SoftDeletes;
    use SortableTrait;

    protected $fillable = [
        'project_id',
        'label',
        'path',
        'thumb_path',
        'ord',
        'user_id'
    ];

    public $sortable = [
        'order_column_name' => 'ord',
        'sort_when_creating' => true,
    ];

    public function project():BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getPathUrl():string
    {
        return Storage::url($this->path);
    }

    public function getThumbPathUrl():string
    {
        return Storage::url($this->thumb_path);
    }

    public function buildSortQuery():Builder
    {
        return static::query()->where('project_id', $this->project_id);
    }
}
