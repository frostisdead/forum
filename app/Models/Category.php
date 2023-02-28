<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'category_name', 'description', 'created_at','updated_at', 'slug'];
    public function subcategories() {
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }
    use HasFactory;
}
