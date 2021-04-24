<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $table = "help";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];
}
