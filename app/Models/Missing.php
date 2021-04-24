<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Missing extends Model
{
    protected $table = "missing_persons";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];
}
