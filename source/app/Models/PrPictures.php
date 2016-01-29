<?php

namespace App\Models;

use DB;

class PrPictures extends BaseModel {

    protected $table = 'pr_pictures';
    protected $fillable = ['pr_provider_id', 'name_picture', 'url', 'flagactive'];

    public function getProvider($idProvider) {
        $dataProviders = PrProviders::join('pr_types', 'pr_providers.pr_type_id', '=', 'pr_types.id')
                ->leftJoin('pr_pictures', 'pr_pictures.pr_provider_id', '=', 'pr_providers.id')
                ->select('pr_types.name_type', 'pr_providers.*', DB::raw('CONCAT("' . asset('') . '", picture_face) AS picture_face'))
                ->where('pr_providers.id', '=', $idProvider)
                ->where('pr_types.name_type', '!=', 'inactivo')
                ->orderBy('pr_providers.lastupdate', 'desc')
                ->first();
        $data = ($dataProviders == null) ? [] : $dataProviders->toArray();
        return $data;
    }

}
