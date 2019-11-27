<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statics extends Model
{
    protected $table = "statics";

    protected $fillable = [
        'user_id', 'latitude', 'logitude',
    ];

    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }

}
