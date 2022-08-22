<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    #protected $fillable = ['title','excerpt','body'];
    #or
    protected $guarded = ['id'];
    # supaya bisa pakai mass-assignment (salah satunya penggunaan Post::create([]))

    protected $with = ['category','author'];
    # supaya memindahkan with di model

    public function scopeFilter($query, array $filters)
    {
        #kalo ada inputan pencarian -> kasih where dahulu
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%'.$search.'%')
                  ->orWhere('body', 'like', '%'.$search.'%');
        });

        #supaya category masuk ke dalam filter pencarian
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        #supaya author masuk ke dalam filter pencarian
        $query->when($filters['author'] ?? false, fn ($query, $author) =>
            $query->whereHas('author', fn ($query) =>
                $query->where('username', $author)
                )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class); #model Post udah berelasi dg model Category 
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); #model Post udah berelasi dg model User || 1 post dimiliki oleh 1 user 
    }

    #supaya di route-model-binding, key yg dipake -> slug (bukan id)
    public function getRouteKeyName()
    {
        return 'slug';
    }

    #sluggable dari column title
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
