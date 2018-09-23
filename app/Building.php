<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable =[
        'name', 'user_id', 'price', 'rent', 'square', 'type',
        'small_desc', 'meta', 'langitude', 'latitude', 'large_desc',
        'status','rooms','place',
    ];

 public function photo(){
     return $this->hasOne('App\Photo');
 }
}
