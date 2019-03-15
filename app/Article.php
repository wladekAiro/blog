<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','slug','body',
    ];

    /**
     * The images that belong to the article
     */
    public function images(){
        return $this->hasMany('App\Image');
    }

    /**
     * The users that belong to the article
     */
    public function user(){
        return $this->belongsToMany('App\User' , 'user_articles');
    }
}
