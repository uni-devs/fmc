<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lordjoo\Crudi\Models\CrudiModel;
use Lordjoo\Crudi\Models\Image;

class Workshop extends CrudiModel
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['image','trainer'];
    public function image()
    {
        return $this->hasOne(Image::class,'id');
    }

    public function trainer()
    {
        return $this->belongsTo(User::class,'trainer_id','id');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

}
