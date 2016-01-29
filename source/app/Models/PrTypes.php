<?php

namespace App\Models;

class PrTypes extends BaseModel {

    const STATE_INACTIVE = 0;
    const STATE_ACTIVE = 1;
    const table = 'pr_types';
    
    protected $table = 'pr_types';
    protected $fillable = ['name_type', 'flagactive'];

}
