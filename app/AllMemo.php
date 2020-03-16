<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllMemo extends Model
{
    protected $guarded = array('id');
    protected $table = 'allmemo';
    
    public static $rules = array(
        'date' => 'required',
        'member' => 'required',
    );
}
