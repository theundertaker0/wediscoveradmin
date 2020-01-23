<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=[
        'question',
        'answer',
        'ext1',
        'ext2'
    ];
}
