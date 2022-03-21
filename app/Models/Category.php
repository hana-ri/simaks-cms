<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    /**
     * menghubungkan tabel category dengan article dengan relasi one to many
     *
     * @return Relasi
     * */
    public function articles()
    {
    	return $this->hasMany(Article::class);
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
}
