<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    public function articles() {
        return $this->belongsTo('App\Article'); //  or whatever your namespace is
    }

    protected $table = 'images';
    protected $fillable = [
        'title',
        'description',
        'image'
    ];
}