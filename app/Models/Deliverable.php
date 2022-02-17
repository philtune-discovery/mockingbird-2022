<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Deliverable extends Model implements Sortable
{
    use SoftDeletes;
    use SortableTrait;

    protected $fillable = [
        'project_id',
        'user_id',
        'text',
        'ord',
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

    public function buildSortQuery():Builder
    {
        return static::query()->where('project_id', $this->project_id);
    }
}
