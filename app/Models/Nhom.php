<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nhom extends Model
{
    protected $table = 'ql64_nhom';
    protected $primaryKey = 'nhomid';
    protected $guarded = [];
    protected $fillable = array(
        'created_by_user_id',
        'updated_by_user_id',
        // The rest of the column names that you want it to be mass-assignable.
    );
}