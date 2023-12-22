<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table      = 'sys_users';
    protected $primaryKey = 'user_id';
    public    $timestamps = true;
}