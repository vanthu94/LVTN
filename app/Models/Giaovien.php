<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Giaovien extends Model
{
    protected $table = 'ql64_giangvien';
    protected $primaryKey = 'MSGV';
    protected $guarded = [];
    public $incrementing = false;
}
