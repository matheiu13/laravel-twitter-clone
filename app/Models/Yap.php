<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yap extends Model
{
    use HasFactory;

    protected $fillable = [
        'yap',
        'like',
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
