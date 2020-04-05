<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    protected $fillable =[
        'user_id','company_id','title','slug','description','roles','category_id','position','address','type','status','last_date'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function checkApplication(){
       return DB::table('job_user')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
    }

    public function favourites(){
        return $this->belongsToMany(Job::class,'favourites','job_id','user_id')->withTimestamps();
    }

    public function checkSaved(){
        return DB::table('favourites')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
    }
}
