<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=[];
    use HasFactory;


    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }


    public function scopeWhenSearch($query,$search){
            return $query->where('championship', 'like', "%$search%")
                ->orwhere('tags','like', "%$search%")
                      ->orwhere('category_id',$search);
    }

}

