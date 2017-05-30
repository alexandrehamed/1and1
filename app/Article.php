<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    /**
     * The table
     *
     * @var string
     */
    protected $table = "articles";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id', 'title', 'content','categorie_id'
    ];

    /**
     * The attributes that should be hidden for arrays
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function categorie() {
        return $this->belongsTo('App\Categorie');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function coms() {
        return $this->hasMany('App\Com');
    }

    public function images() {
        return $this->belongsToMany('App\Image'); //  or whatever your namespace is
    }

    public static function boot()
    {
        parent::boot();

        self::deleting(function (Article $article){

            foreach ($article->coms as $coms)
            {
                $coms->delete();
            }
        });
    }

}
