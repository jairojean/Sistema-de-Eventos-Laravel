<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $dates = ['date'];
    protected $casts= ['items' => 'array'];
    protected $fillable = ['title','description','city','district','image','vip','items','date','user_id'];
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
     
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
    
    protected $guarded = [];
}
