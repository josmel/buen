<?php

namespace App\Models;

use App\Models\PrPictures,
	App\Models\PrComments,
	App\Models\PrScore,
	DB;

class PrProviders extends BaseModel {

	const Type_Inactivo = 'inactivo';
	const Type_Comun = 'comun';
	const Type_Premium = 'premium';

	protected $table = 'pr_providers';
	protected $fillable = ['pu_category_id', 'name_provider', 'reason_social', 'type_document', 'number_document', 'picture_face',
		'phone', 'website', 'email', 'address', 'coordenate', 'pr_typ_id', 'ranking', 'flagactive', 'user_id'];

	public function getProvider($idProvider) {
		$dataProviders = PrProviders::join('pr_types', 'pr_providers.pr_type_id', '=', 'pr_types.id')
				->leftJoin('pr_pictures', 'pr_pictures.pr_provider_id', '=', 'pr_providers.id')
				->select('pr_types.name_type', 'pr_providers.*', DB::raw('CONCAT("' . asset('') . '", picture_face) AS picture_face'))
				->where('pr_providers.id', '=', $idProvider)
				->where('pr_types.name_type', '!=', PrProviders::Type_Inactivo)
				->orderBy('pr_providers.lastupdate', 'desc')
				->first();
		$data = ($dataProviders == null) ? [] : $dataProviders->toArray();
		if ($data != []) {
			$data['comments'] = PrComments::join('users as u ', 'u.id', '=', 'pr_comments.user_id')
							->select('pr_comments.*', DB::raw('CONCAT("' . asset('') . '", pr_comments.picture) AS picture_comment'), DB::raw('CONCAT("' . asset('') . '", u.picture) AS picture_user'), DB::raw('CONCAT(u.name, " ", u.lastname) AS name_user'))
							->where('pr_comments.pr_provider_id', '=', $idProvider)
							->orderBy('pr_comments.datecreate', 'desc')
							->get()->toArray();
			$value = ($data['name_type'] == PrProviders::Type_Premium) ? 'get' : 'first';
			$dataPictureProvider = PrPictures::wherePrProviderId($idProvider)
					->select('flagactive', 'datecreate', DB::raw('CONCAT("' . asset('') . '", url) AS picture'))
					->$value();
			$data['picture_provider'] = ($dataPictureProvider == null) ? [] : $dataPictureProvider->toArray();
		}
		return $data;
	}

	public function getallProviders($category = null, $name_provider = null, $page) {
		$dataProviders = PrProviders::join('pr_types', 'pr_providers.pr_type_id', '=', 'pr_types.id')
				->leftJoin('pr_pictures', 'pr_pictures.pr_provider_id', '=', 'pr_providers.id')
//				->leftJoin('pr_comments as com', 'pr_providers.id', '=', 'com.pr_provider_id')
				->join('pu_categories as puc', 'pr_providers.pr_type_id', '=', 'puc.id')
				->select(
				'pr_providers.*', DB::raw('CONCAT("' . asset('') . '", picture_face) AS picture_face'),
						DB::raw('CONCAT("' . asset('') . '", puc.picture) AS picture_category'), 
						'pr_types.name_type', 'puc.name_category'
//						,DB::raw('count(com.id) as total_users')
						);
		if ($category != null) {
			$dataProviders = $dataProviders->where('pr_providers.pu_category_id', '=', $category);
		}
		if ($name_provider != null) {
			$dataProviders = $dataProviders->where('pr_providers.name_provider', 'like', '%' . $name_provider . '%');
		}
		$dataProviders = $dataProviders->where('pr_providers.flagactive', '=', 1)
				->groupby('pr_providers.id')
				->where('name_type', '!=', PrProviders::Type_Inactivo)
//				->where('com.flagactive', '=', 1)
				->skip($this->perpage * ($page - 1))
				->orderBy('pr_providers.pr_type_id', 'desc')
				->orderBy('pr_providers.ranking', 'desc')
				->orderBy('pr_providers.lastupdate', 'desc')
				->take($this->perpage)
				->get();
		$data = ($dataProviders == null) ? [] : $dataProviders->toArray();
		$newdata = [];
		if ($data) {
			foreach ($data as $row) {
//                $score =PrScore::wherePrProviderId($row['id'])->select(DB::raw('count(id) as score'))->get();
				$value = ($row['name_type'] == PrProviders::Type_Premium) ? 'get' : 'first';
				$dataPictureProvider = PrPictures::wherePrProviderId($row['id'])
						->select('flagactive', 'datecreate', DB::raw('CONCAT("' . asset('') . '", url) AS picture'))
						->$value();
				$total_users = PrComments::wherePrProviderId($row['id'])->whereFlagactive(1)
						->select(DB::raw('count(id) as total_users'))
						->get()->first();
				$row["total_users"] = $total_users->total_users;
				$row["friends"] = [['idfacebook'=>'10156644988105647'],['idfacebook'=>'620320758106445'],
					['idfacebook'=>'10153512513095805'],['idfacebook'=>'10156576400725089']];
				if ($dataPictureProvider == null) {
					$row['picture_provider'] = [];
				} else {
					$row['picture_provider'] = ($value == 'get') ? $dataPictureProvider->toArray() : [$dataPictureProvider->toArray()];
				}
				$newdata[] = $row;
			}
		} else {
			$newdata = [];
		}
		return $newdata;
	}

	public function allProviders($category = null, $page) {
		$dataProviders = PrProviders::join('pr_types', 'pr_providers.pr_type_id', '=', 'pr_types.id')
				->select('pr_types.name_type', 'pr_providers.*', DB::raw('CONCAT("' . asset('') . '", picture_face) AS picture_face'));
		if ($category != null) {
			$dataProviders = $dataProviders->where('pr_providers.pu_category_id', '=', $category);
		}
		$dataProviders = $dataProviders->where('pr_providers.flagactive', '=', 1)
				->where('pr_types.name_type', '!=', PrProviders::Type_Inactivo)
				->groupby('pr_providers.id')
				->skip($this->perpage * ($page - 1))
				->orderBy('pr_providers.pr_type_id', 'desc')
				->orderBy('pr_providers.ranking', 'desc')
				->orderBy('pr_providers.lastupdate', 'desc')
				->take($this->perpage)
				->get();
		$newdata = [];
		foreach ($dataProviders as $row) {
			$row = $row->toarray();
			$newdata[] = $row;
		}
		return $newdata;
	}

	public function ProviderForDataTable($condicion,$valoracion=null) {
		$dataProviders = PrProviders::join('pr_types', 'pr_providers.pr_type_id', '=', 'pr_types.id');
				if ($valoracion != null) {
			$dataProviders = $dataProviders->join('pr_comments as prc', 'pr_providers.id', '=', 'prc.pr_provider_id');
			} else {
				$dataProviders = $dataProviders->leftJoin('pr_comments as prc', 'pr_providers.id', '=', 'prc.pr_provider_id');
			}
				$dataProviders = $dataProviders->select('pr_types.name_type', 'pr_providers.*',
						DB::raw('COUNT(prc.id) as valoracion'),
						DB::raw('CONCAT("' . asset('') . '", picture_face) AS picture_face'),
							DB::raw("(if(pr_providers.flagactive='1','Activo',(if(pr_providers.flagactive='0','Inactivo','-')))) as flagactive"),
						DB::raw("(if(pr_providers.flagactive='1','lock',(if(pr_providers.flagactive='0','unlock','-')))) as estado")
						)
//				->where('pr_providers.flagactive', '=', 1)
				->where('pr_types.name_type', $condicion, PrProviders::Type_Inactivo)
				->groupby('pr_providers.id')
				->orderBy('pr_providers.pr_type_id', 'desc')
				->orderBy('pr_providers.ranking', 'desc')
				->orderBy('pr_providers.lastupdate', 'desc')
				->groupBy('pr_providers.id');
		return $dataProviders;
	}

}
