<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $table = 'platos';

    protected $fillable = [
        'name',
        'description',
        'image',
        'region_id'
    ];

    public function region(){
        return $this->belongsTo('App\Region', 'region_id');
    }
}
