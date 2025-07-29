<?php

namespace App\Models;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use Tenantable;

    protected $guarded = [];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
