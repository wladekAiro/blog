<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'name'
    ];

    /**
     * The users that belong to the role
     */
    public function users(){
        return $this->belongsToMany('App\User' , 'user_roles');
    }
}
