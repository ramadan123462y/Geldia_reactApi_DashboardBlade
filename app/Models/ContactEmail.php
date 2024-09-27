<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactEmail extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'phone',
        'user_type_id',
        'content',
        'email'

    ];

    public function usertype()
    {

        return $this->belongsTo(UserType::class,'user_type_id');
    }
}
