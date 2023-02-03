<?php

namespace App\Models;

class User extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'user';
    protected $fillable = ['username','password','create_time','type_user'];
    public $timestamps = false;

}

?>