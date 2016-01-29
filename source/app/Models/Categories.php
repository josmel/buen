<?php

namespace App\Models;
use DB;

class Categories extends BaseModel {

    const STATE_INACTIVE = 0;
    const STATE_ACTIVE = 1;
    protected $table = 'pu_categories';
    protected $fillable = ['name_category', 'flagactive', 'picture'];

    public function allcategories() {
        $dataCategory = Categories::where('flagactive', '!=', 0)
                ->select('pu_categories.*', DB::raw('CONCAT("' . asset('') . '", picture) AS picture'))
                ->get();
        return $dataCategory;
    }

}
