<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $guarded = [];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function scopeTenanting(Builder $query)
    {
        return $query->where('tenant_id', Auth::user()->tenant_id);
    }

    protected static function booted()
    {
        static::creating(function ($article) {
            $article['tenant_id'] = Auth::user()->tenant_id;
        });
    }
}
