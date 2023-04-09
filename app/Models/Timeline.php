<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    protected $fillable = ['timeline','film_id','release_id'];
    public function films(){
        return $this->hasOne(Film::class, 'id','film_id');
    }
    public function release_dates(){
        return $this->hasOne(Release_date::class, 'id','release_id');
    }
    public function tickets(){
        return $this->hasMany(Ticket::class, 'timeline_id','id');
    }
    public function scopeIsTimeline($query,$id){
        $timeline = $query->where('id',$id)->first();
        return $timeline;
    }
    public function scopeIsTimelineQueryByFilmId($query, $id ){
        $result = $query->where('film_id',$id);
        return $result;
    }
    public function scopeIsTimelineQueryByDateId($query, $id ){
        $result = $query->where('release_id',$id);
        return $result;
    }
    public function getTicketCountAttribute()
    {
        return $this->tickets->count();
    }
    public function scopeIsTimelineQueryByFilmDateId($query, $film_id, $date_id ){
        $result = $query->where([
            ['film_id','=',$film_id],
            ['release_id','=',$date_id]
        ]);
        return $result;
    }
}
