<?php

namespace App\Models;

use App\Models\ContactEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $fillable = [

        'type'
    ];

    public function contactemail()
    {

        return $this->hasMany(ContactEmail::class);
    }
}
