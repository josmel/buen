<?php

namespace App\Models;

class Configuration extends BaseModel {

    const STATE_INACTIVE = 0;
    const STATE_ACTIVE = 1;
    protected $table = 'configuration';
    protected $fillable = ['limit_datear', 'flagactive', 'limit_buen_dato','limit_friends','limit_assessment_providers'];

}
