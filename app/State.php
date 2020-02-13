<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class State extends Model
{
    use SoftDeletes;
    use SoftCascadeTrait;
    protected $dates=['deleted_at'];
    protected $softCascade=['locations'];
    protected $fillable=[
        'name',
        'short_name',
        'description',
        'biodiversity',
        'ext1',
        'ext2',
        'weather',
        'police_number',
        'firemen_number',
        'medical_number',
        'government_number',
        'lat',
        'lng'
    ];


    public function locations(){
        return $this->hasMany('App\Location');
    }
}
