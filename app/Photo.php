<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $uploads = '/images/';
    protected $fillable = [
         'file','id',
    ];

    //create function to get the directory of the picture
   public function getFileAttribute($photo){
        return $this->uploads .$photo;
    }
}
