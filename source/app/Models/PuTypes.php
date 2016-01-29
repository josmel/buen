<?php

namespace App\Models;

class PuTypes extends BaseModel {

	protected $table = 'pu_types';
	protected $fillable = ['name_type', 'flagactive'];

	 const STATE_INACTIVE = 0;
    const STATE_ACTIVE = 1;
	const TYPE_COMUN = 'comun';
	const TYPE_POPULAR = 'popular';
	const TYPE_PREMIUM = 'premium';
	
	public function getIdPuType($name){
	$dataType =	PuTypes::whereNameType($name)->lists('id')->first();
	return $dataType;
	}
	

}
