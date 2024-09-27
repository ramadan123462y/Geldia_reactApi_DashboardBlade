<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'is_new',
        'image_file',
        'articlesubcategorie_id',
        'user_id',
        'home_page',
        'most_famous',
        'count_views'
    ];
    public function articlesubcategorie()
    {


        return $this->belongsTo(Articlesubcategorie::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function descreptionArticles()
    {


        return $this->hasMany(DescreptionArticle::class);
    }

    public function subUsers()
    {


        return $this->belongsToMany(User::class, 'article_user', 'article_id', 'user_id');
    }

    public function banner()
    {


        return $this->hasOne(Banner::class);
    }

    public function galleries()
    {


        return $this->hasMany(Gallery::class);
    }

    public function video()
    {


        return $this->hasOne(Video::class);
    }

    public function beforeafter()
    {

        return $this->hasOne(BeforeAfter::class);
    }

    // public function categorie(){


    //     return $this->has
    // }
}
