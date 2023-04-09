<?php 
function linkDetail($product) {
    return route('home.detail', ['idFilm' => $product->id, 'slug' => Str::slug($product->name)]);
}
function linkDetailDate($product, $date) {
    return route('home.detailDate', [
    'idFilm' => $product->id,
     'slug' => Str::slug($product->name),
     'idDate' => $date->id,
    'slugDate'=> Str::slug($date->release_date)
    ]);
}
function linkDetailTimeline($product, $date, $time) {
    // dd($time->id);
    return route('home.ticket', [
    'idFilm' => $product->id,
     'slug' => Str::slug($product->name),
     'idDate' => $date->id,
     'idTimeline'=> $time->id,
    'slugDate'=> Str::slug($date->release_date),
    
    ]);
}
function linkDetailTimelineID($film, $slug, $date, $slugDate, $time) {
    // dd($time->id);
    return route('home.ticket', [
    'idFilm' => $film,
     'slug' => Str::slug($slug),
     'idDate' => $date,
     'idTimeline'=> $time,
    'slugDate'=> Str::slug($slugDate),
    ]);
}
?>