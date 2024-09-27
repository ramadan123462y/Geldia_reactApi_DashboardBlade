<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [

        'video_name',
        'article_id',
        'home_page'
    ];

    public function article()
    {


        return $this->belongsTo(Article::class);
    }
}
