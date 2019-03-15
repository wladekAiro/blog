<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name' , 'link'
    ];

    public function article(){
        return $this->belongsTo('App\Article');
    }
}
