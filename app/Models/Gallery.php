<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [

        'image_file',
        'article_id',
    ];

    public function article()
    {

        return $this->belongsTo(Article::class);
    }
}
