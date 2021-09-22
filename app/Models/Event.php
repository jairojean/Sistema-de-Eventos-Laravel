<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $dates = ['date'];
    protected $casts= ['items' => 'array'];
    protected $fillable = ['id','title','descrition','city','district','image','vip','items','date'];
 
}
