<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articlecategorie extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'image_name',
    ];

    public function articlesubcategories()
    {

        return $this->hasMany(Articlesubcategorie::class);
    }

    public function articles()
    {
        return $this->hasManyThrough(Article::class, Articlesubcategorie::class);
    }
}
