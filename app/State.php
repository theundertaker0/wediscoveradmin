<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=[
        'name',
        'short_name',
        'description',
        'biodiversity',
        'ext1',
        'ext2',
        'wheater',
        'police_number',
        'firemen_number',
        'medical_number'
    ];


    public function locations(){
        return $this->hasMany('App\Location');
    }
}
