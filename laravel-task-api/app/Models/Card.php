<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Card extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    protected $fillable = [
        'title',
    ];

    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }

    public function buildSortQuery(): Builder
    {
        return static::query()->where('board_id', $this->board_id);
    }
}
