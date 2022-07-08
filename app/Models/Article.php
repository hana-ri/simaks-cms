<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    // Eiger loading
    protected $with = ['author', 'category'];

    public function scopeFilter($query, array $filters) {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%'.$filters['search'].'%')
        //              ->orWhere('body', 'like', '%'.$filters['search'].'%');
        // }

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body', 'lile', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            return $query->whereHas('author', function ($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }

    /**
     * menghubungkan tabel article dengan category.
     * dengan relasi one to one
     * @return relasi
     */
    public function category() {
    	return $this->belongsTo(Category::class);
    }

    /**
     * menghubungkan model article dengan author.
     * dengan relasi one to one
     * @return relasi
     */
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the route key for the model.
     * untuk melakukan key binding pada router yang dibuat dengan resource
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function tags()
    {
        return $this->belongsToMany(Article::class, 'tag_article');
    }
}