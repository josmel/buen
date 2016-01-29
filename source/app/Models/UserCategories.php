<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
DB;

class UserCategories extends Model {

    protected $table = 'users_pu_categories';
    protected $fillable = ['users_id', 'pu_categories_id'];
    public $timestamps = false;

    public function UserCategories($users_id) {
        $data = UserCategories::join('users', 'users.id', '=', 'users_pu_categories.users_id')
                ->join('pu_categories as puc', 'puc.id', '=', 'users_pu_categories.pu_categories_id')
                ->select('puc.id',DB::raw('CONCAT("' . asset('') . '", puc.picture) AS picture'),'puc.name_category')
                ->where('puc.flagactive', '=', 1)
                ->where('users.id', '=', $users_id)
                ->orderBy('puc.id', 'asc')
                ->get();
        return $data;
    }

}
