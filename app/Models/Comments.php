<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'content', 'user_id', 'post_id', 'created_at', 'updated_at'];
    use HasFactory;
    public function posts()
{
    return $this->belongsTo(Post::class, 'post_id', 'id');
}

public function users()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}
}
