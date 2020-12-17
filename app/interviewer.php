<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class interviewer extends Model
{
    protected $table ='interviewer';

      protected $fillable = [
        'name', 'email', 'mobile','exmobile','technology','expirence','currentsalary','expectedsalary',
    	'education','practical','technical','general','hr_id',
    ];
    
    public function inter(){
    	return $this->belongsTo(user::class,'hr_id');
    }
    
    public function gettechnology()
    {
        return $this->belongsTo(technology::class,"technology");
    }
    

}
