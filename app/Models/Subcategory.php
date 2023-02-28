<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'subcategory_name', 'description', 'category_id', 'created_at','updated_at', 'slug'];
    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    use HasFactory;
}
