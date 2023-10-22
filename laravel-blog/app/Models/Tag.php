<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public static function findOrCreateFromRequest(Request $request)
    {
        if (strlen($request->input('tags')) < 3) {
            return [];
        }

        $tags = explode(',', $request->input('tags'));

        return collect($tags)
            ->map(function ($item) {
                return trim($item);
            })->map(function ($item) {
                return Tag::firstOrCreate([
                    'name' => $item,
                ], [
                    'slug' => Str::slug($item),
                ])->id;
            });
    }
}
