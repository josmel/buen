<?php

namespace App\Models;

class PrScore extends BaseModel {

    const table = 'pr_score';
    protected $table = 'pr_score';
    protected $fillable = ['score','pr_provider_id' ,'user_id','flagactive'];

}
