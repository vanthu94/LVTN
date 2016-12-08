<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sinhvien extends Model
{
    protected $table = 'ql64_sinhvien';
    protected $primaryKey = 'MSSV';
    protected $guarded = [];
    public $incrementing = false;
    protected $fillable = array(
        'created_by_user_id',
        'updated_by_user_id',
        // The rest of the column names that you want it to be mass-assignable.
    );
}
