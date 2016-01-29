<?php

namespace App\Models;

class PuPicture extends BaseModel {

    protected $table = 'pu_pictures';
    protected $fillable = ['name_picture', 'pu_ad_id','url','flagactive'];

}
