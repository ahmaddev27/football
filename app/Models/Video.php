<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded=[];
    use HasFactory;


    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }


    public function scopeWhenSearch($query,$search){

        return $query->when($search, function ($q) use ($search) {
            return $q->where('category_id', 'like', "%$search%");
        });
    }



}
