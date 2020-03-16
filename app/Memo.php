<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $guarded = array('id');
    protected $table = 'memo';
    
    public static $rules = array(
        'which' => 'required',
        'comment' => 'required',
    );

}
