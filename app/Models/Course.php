<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, $params)
    {
        if (@$params['category']) {
            $query->whereHas('category', function ($q) use ($params) {
                $q->where('slug', $params['category']);
            });
        }

        if (@$params['search']) {
            $query->where('name', 'like', '%' . $params['search'] . '%');
        }
    }
}
