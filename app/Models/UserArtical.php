<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserArtical extends Model
{
    protected $table = "user_artical";
    public $timestamps = true;
    protected $primaryKey = "article_id";
    protected $guarded = [];
}
