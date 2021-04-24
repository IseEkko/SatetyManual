<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";
    public $timestamps = true;
    protected $primaryKey = "article_id";
    protected $guarded = [];

}
