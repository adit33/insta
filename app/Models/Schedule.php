<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
   protected $table='schedules';
   protected $fillable=['insta_account_id','time','photo','status'];
}
