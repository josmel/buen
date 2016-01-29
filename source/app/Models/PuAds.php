<?php

namespace App\Models;

use DB,
	App\Models\PuLikes,
	App\Models\PuComments,
	App\Models\PrProviders,
	App\Models\Categories,
	App\Models\PrScore;

class PuAds extends BaseModel {

	protected $table = 'pu_ads';
	protected $fillable = ['pu_type_id', 'pu_category_id', 'pu_state_id', 'user_id', 'pr_provider_id',
		'description', 'date_publish', 'date_expired', 'flagactive'];

	public function getPremiumAds() {
		$listPremiumAds = DB::select('SELECT pads.id, pads.pu_type_id, pads.pu_category_id, pads.pu_state_id, pads.user_id, pads.pr_provider_id, pcom.description as pu_description, pcom.picture , pads.description as ads_description, pads.date_publish, pads.date_expired
                                        FROM pu_ads as pads, pu_comments as pcom
                                        WHERE pads.id = pcom.pu_ad_id
                                        AND pads.pu_type_id = 3
                                        limit 0,1');
		return $listPremiumAds;
	}

	public function getPublishAds_count() {
		$listPublishAds_count = DB::select('call sp_listPub()');

		return $listPublishAds_count[0];
	}

	public function getSessions_count() {
		$listPublishAds_count = DB::select('call sp_listSessions()');

		return $listPublishAds_count[0];
	}

	public function getAllAdsForUser($idUSer, $page) {
		try {
			$data = PuAds::leftJoin('pu_pictures', 'pu_ads.id', '=', 'pu_pictures.pu_ad_id')
							->select('pu_ads.*', DB::raw('CONCAT("' . asset('') . '", pu_pictures.url) AS picture'))
							->where('pu_ads.user_id', '=', $idUSer)
							->where('pu_ads.flagactive', '=', 1)
							->skip($this->perpage * ($page - 1))
							->orderBy('pu_ads.lastupdate', 'desc')->take($this->perpage)->get();
			return $data;
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
			exit;
		} finally {
			
		}
	}

	public function getAllAds($category = null, $description = null, $user_id = null, $page, $type = null) {
		try {
			$data = PuAds::leftJoin('pu_pictures', 'pu_ads.id', '=', 'pu_pictures.pu_ad_id')
					->join('pu_types as t', 'pu_ads.pu_type_id', '=', 't.id')
					->join('users as u', 'pu_ads.user_id', '=', 'u.id')
					->join('pu_categories as ca', 'pu_ads.pu_category_id', '=', 'ca.id')
					->leftJoin('pr_providers as p', 'pu_ads.pr_provider_id', '=', 'p.id')
					->leftJoin('pr_comments as pc', 'pu_ads.pr_provider_id', '=', 'pc.id')
					->leftJoin('pr_types as prt', 'p.pr_type_id', '=', 'prt.id')
					->select('pu_ads.*', DB::raw('CONCAT("' . asset('') . '", pu_pictures.url) AS picture_publication'), DB::raw('CONCAT("' . asset('') . '", u.picture) AS picture_user'), DB::raw('CONCAT("' . asset('') . '",'
							. ' p.picture_face) AS picture_provider'), DB::raw('CONCAT("' . asset('') . '", ca.picture) AS picture_category'), DB::raw('CONCAT(u.name, " ", u.lastname) AS name_user'), 'u.idfacebook', 'prt.name_type as name_type_provider', 'p.name_provider', 'p.pu_category_id', 'ca.name_category', 'p.ranking as ranking_provider', 't.name_type', 'prt.id as id_type_provider');
			if ($category != null) {
				$data = $data->whereIn('pu_ads.pu_category_id', $category);
			}
			if ($description != null) {
				$data = $data->where('pu_ads.description', 'like', '%' . $description . '%');
			}
			if ($user_id != null) {
				$data = $data->where('pu_ads.user_id', '=', $user_id);
			}
			if ($type != null) {
				$data = $data->where('t.name_type', '=', $type);
			}
			$data = $data->where('pu_ads.flagactive', '=', 1)
							->skip($this->perpage * ($page - 1))
							->orderBy('pu_ads.pu_type_id', 'desc')
//                            ->orderBy('pr_providers.ranking', 'desc')
//                            ->orderBy('pr_providers.lastupdate', 'desc')
							->orderBy('pu_ads.lastupdate', 'desc')
							->groupBy('pu_ads.id')
							->take($this->perpage)->get();
			$dataFinish = $data->toArray();
			if ($dataFinish) {
				foreach ($dataFinish as $value) {
					$likes = PuLikes::wherePuAdId($value['id'])->select(DB::raw('count(id) as likes'))->get();
					$comments = PuComments::wherePuAdId($value['id'])->select(DB::raw('count(id) as comments'))->get();
					$valueFinal = [
						"id" => $value["id"],
						"idfacebook" => $value["idfacebook"],
						"pu_type_id" => $value["pu_type_id"],
						"pu_category_id" => $value["pu_category_id"],
						"pu_state_id" => $value["pu_state_id"],
						"user_id" => $value["user_id"],
						"description" => $value["description"],
						"date_publish" => $value["date_publish"],
						"date_expired" => $value["date_expired"],
						"flagactive" => $value["flagactive"],
						"datecreate" => $value["datecreate"],
						"lastupdate" => $value["lastupdate"],
						"picture_publication" => $value["picture_publication"],
						"picture_user" => $value["picture_user"],
						"picture_category" => $value["picture_category"],
						"name_user" => $value["name_user"],
						"name_category" => $value["name_category"],
						"name_type" => $value["name_type"],
						"likes" => $likes[0]->likes,
						"comments" => $comments[0]->comments
					];
					if ($value['pr_provider_id']) {
						$score = PrScore::wherePrProviderId($value['pr_provider_id'])->select(DB::raw('count(id) as score'))->get();
						$providerCategory = Categories::whereId($value['pu_category_id'])
										->select('name_category', DB::raw('CONCAT("' . asset('') . '", picture) AS picture_category'))->first();
						$EstadoTipo = ($value['name_type_provider'] == PrProviders::Type_Inactivo) ? "0" : "1";
						$valueFinal['provider'] = [['pr_provider_id' => $value['pr_provider_id'],
						'id_type_provider' => $value['id_type_provider'],
						'name_provider' => $value['name_provider'],
						'name_type_provider' => $value['name_type_provider'],
						'approved' => $EstadoTipo,
						"total_users" => $score[0]->score,
						"score" => $value["ranking_provider"],
						'picture_provider' => $value['picture_provider'],
						'name_category' => $providerCategory->name_category,
						'picture_category' => $providerCategory->picture_category,
						]];
					} else {
						$valueFinal['provider'] = [];
					}
					$dataFinish1[] = $valueFinal;
				}
			} else {
				$dataFinish1 = [];
			}

			return $dataFinish1;
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
			exit;
		}
	}

	public function PostForDataTable($idUser = null, $denunciada = null) {
		$table = PuAds::leftJoin('pu_pictures', 'pu_ads.id', '=', 'pu_pictures.pu_ad_id')
				->join('pu_types as t', 'pu_ads.pu_type_id', '=', 't.id')
				->join('users as u', 'pu_ads.user_id', '=', 'u.id')
				->join('pu_categories as ca', 'pu_ads.pu_category_id', '=', 'ca.id')
				->leftJoin('pr_providers as p', 'pu_ads.pr_provider_id', '=', 'p.id')
				->leftJoin('pu_comments as pc', 'pu_ads.id', '=', 'pc.pu_ad_id');
		if ($denunciada != null) {
			$table = $table->join('pu_complaints as puc', 'pu_ads.id', '=', 'puc.pu_ad_id');
		} else {
			$table = $table->leftJoin('pu_complaints as puc', 'pu_ads.id', '=', 'puc.pu_ad_id');
		}
		$table = $table->leftJoin('pu_likes as li', 'pu_ads.id', '=', 'li.pu_ad_id')
				->leftJoin('pr_types as prt', 'p.pr_type_id', '=', 'prt.id')
				->select('pu_ads.*', DB::raw('CONCAT("' . asset('') . '", pu_pictures.url) AS picture_publication'),
//						DB::raw('CONCAT("' . asset('') . '", u.picture) AS picture_user'),
				DB::raw('COUNT(pc.id) as comentarios'),
						DB::raw('COUNT(li.id) as likes'), 
						DB::raw('COUNT(puc.id) as total'), 'u.picture as picture_user', 
						DB::raw('CONCAT("' . asset('') . '",p.picture_face) AS picture_provider'),
						DB::raw("(if(pu_ads.flagactive='1','Activo',(if(pu_ads.flagactive='0','Inactivo','-')))) as flagactive"),
						DB::raw("(if(t.name_type='premium','active','')) as premium"),
						DB::raw("(if(pu_ads.flagactive='1','lock',(if(pu_ads.flagactive='0','unlock','-')))) as estado"),
						DB::raw('CONCAT("' . asset('') . '", ca.picture) AS picture_category'), 'u.id as idUser',
						DB::raw('CONCAT(u.name, " ", u.lastname) AS name_user'), 'prt.name_type as name_type_provider', 
						'p.name_provider', 'ca.name_category',
						'p.ranking as ranking_provider', 't.name_type', 'prt.id as id_type_provider');
		if ($idUser != null) {
			$table = $table->where('pu_ads.user_id', '=', $idUser);
		}
		$table = $table
				->orderBy('pu_ads.pu_type_id', 'desc')
				->orderBy('pu_ads.flagactive', 'desc')
//				->orderBy('likes', 'DESC')
//				->orderBy('comentarios', 'DESC')
				
//				->where('pu_ads.flagactive', '=','desc')
				->orderBy('pu_ads.lastupdate', 'desc')
				->groupBy('pu_ads.id');
				
		return $table;
	}

	public function getAdsType($idPost , $value = null) {
		$dataAds = PuAds::join('pu_types as t', 'pu_ads.pu_type_id', '=', 't.id')
				->leftJoin('pu_comments as comment', 'pu_ads.id', '=', 'comment.pu_ad_id')
				->leftJoin('pu_likes as likes', 'pu_ads.id', '=', 'likes.pu_ad_id')
				->select('pu_ads.*', 't.*', DB::raw('count(comment.id) as comentario'),DB::raw('count(likes.id) as likes'))
			->where('pu_ads.id', '=', $idPost)
		->where('pu_ads.flagactive', '=', 1);
		if ($value) {
			switch ($value) {
				case 1:
					$dataAds = $dataAds->where('likes.flagactive', '=', 1);
					break;
				case 2:
					$dataAds = $dataAds->where('comment.flagactive', '=', 1);
					break;
			}
		}
		$dataAds = $dataAds->first();
		return $dataAds;
	}

}
