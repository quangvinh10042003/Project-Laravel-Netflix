<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release_date extends Model
{
    use HasFactory;
    protected $fillable = ['release_date'];
    public function timelines(){
        return $this->hasMany(Timeline::class, 'film_id','id');
    }
    public function scopeIsDateQueryByDate($query, $date ){
        $result = $query->where('release_date',$date);
        return $result;
    }
    public function scopeIsDateQueryById($query, $id ){
        $result = $query->where('id',$id);
        return $result;
    }
}
