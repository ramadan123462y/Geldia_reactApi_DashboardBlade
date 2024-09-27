<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescreptionArticle extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'content',
        'article_id',
        'order'
    ];

    public function article()
    {

        return $this->belongsTo(Article::class);
    }
}
