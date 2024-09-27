<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [

        'image_name',
        'article_id',
    ];

    public function article()
    {

        return $this->belongsTo(Article::class);
    }
}
