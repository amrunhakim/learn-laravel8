<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id']; #supaya bisa pakai mass-assignment

    public function posts()
    {
        return $this->hasMany(Post::class); #1 category punya banyak post
    }
}
