<?php

namespace App\Models;

class PuLikes extends BaseModel {
    protected $table = 'pu_likes';
    protected $fillable = ['pu_ad_id','user_id', 'flagactive'];

}
