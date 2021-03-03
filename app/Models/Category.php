<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable=['name_category','id_parent'];

    public function parentCategory(){
        return $this->belongsTo("App\Models\Category","parent_id");
    }

    public function subCategories(){
        return $this->hasMany("App\Models\Category","parent_id");
    }
  
    public function products()
    {
        return $this->HasMany('App\Models\Product');
    }

}
