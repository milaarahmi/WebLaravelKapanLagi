<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    protected $table = 'datauser';
    public $primaryKey = 'id';
    public $timestamp = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
