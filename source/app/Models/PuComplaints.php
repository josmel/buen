<?php

namespace App\Models;

class PuComplaints extends BaseModel {

    protected $table = 'pu_complaints';
    protected $fillable = ['user_id', 'pu_ad_id', 'flagactive'];

}
