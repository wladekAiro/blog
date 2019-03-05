<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name' , 'link'
    ];

    public function article(){
        return $this->belongsTo('App\Article');
    }
}
