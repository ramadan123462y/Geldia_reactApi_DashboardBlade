<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articlesubcategorie extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'articlecategorie_id',
        'image_name',
        'descreption'
    ];

    public function articlecategorie()
    {

        return $this->belongsTo(Articlecategorie::class);
    }

    public function articles()
    {


        return $this->hasMany(Article::class);
    }
}
