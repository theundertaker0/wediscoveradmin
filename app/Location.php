<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Location extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=[
        'name',
        'short_description',
        'image',
        'description',
        'state_id',
        'biodiversity',
        'environmental',
        'culture',
        'archeology',
        'history',
        'economy',
        'sustainable_development',
        'demography',
        'gastronomy',
        'lat',
        'lng',
        'ext1',
        'ext2'
    ];

    public function state(){
        return $this->belongsTo('App\State');
    }
}
