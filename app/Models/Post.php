<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'post_topic', 'post_description', 'post_by', 'subcategory_id', 'created_at', 'updated_at', 'slug'];
    public function subcategories() {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    public function users()
{
    return $this->belongsTo(User::class);
}

public function comments()
{
    return $this->hasMany(Comments::class, 'post_id', 'id');
}
}
