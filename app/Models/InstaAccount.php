<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstaAccount extends Model
{
    protected $table='insta_accounts';
    protected $fillable=['user_id','password'];
}
