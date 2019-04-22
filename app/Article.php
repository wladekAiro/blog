<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed body
 * @property mixed title
 * @property string slug
 */
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
    public function users(){
        return $this->belongsToMany('App\User' , 'user_articles');
    }
}
