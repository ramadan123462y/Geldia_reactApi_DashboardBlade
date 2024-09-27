<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeforeAfter extends Model
{
    use HasFactory;

    protected $fillable = [

        'image_before',
        'image_after',
        'article_id',
    ];

    public function article()
    {

        return $this->belongsTo(Article::class);
    }
}
