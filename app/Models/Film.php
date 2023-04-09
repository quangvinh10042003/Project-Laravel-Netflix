<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ['name','category','actor','image','content','producer','time'];
    public function timelines(){
        return $this->hasMany(Timeline::class, 'film_id','id');
    }
    public function tickets(){
        return $this->hasMany(Ticket::class, 'film_id','id');
    }
    public function scopeIsFilmQueryById($query, $id ){
        $result = $query->where('id',$id);
        return $result;
    }
    public function scopeSearch($query){
       
        $result = $query->where('name','like','%'.request('keyword').'%')
                    ->orderBy('id','DESC')->get();
        return $result;
    }
}
