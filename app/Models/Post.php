<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'exerpt', 'body', 'image'];

    public function author ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags ()
    {
        return $this->belongsToMany(Tag::class);
    }
}
