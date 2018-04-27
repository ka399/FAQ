<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    // fillable properties
    protected $fillable = ['fname', 'lname', 'body'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
