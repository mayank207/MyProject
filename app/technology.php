<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class technology extends Model
{
    protected $table='technology';

      protected $fillable = [
        'technology', 'hr_id', 
    ];

    public function tech(){
    	return $this->belongsTo(user::class,'hr_id');
    }
    
}
