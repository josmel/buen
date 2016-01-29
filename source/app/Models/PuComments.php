<?php

namespace App\Models;

use DB,
	App\Models\PrScore,
	App\Models\PrProviders;

class PuComments extends BaseModel {

	protected $table = 'pu_comments';
	protected $fillable = ['pu_ad_id', 'user_id', 'pr_provider_id', 'picture', 'flagactive', 'description'];

	public function getAllCommentForAds($ads_id, $page) {
		try {
			$data = PuComments::join('pu_ads as ads', 'pu_comments.pu_ad_id', '=', 'ads.id')
							->join('users as u', 'pu_comments.user_id', '=', 'u.id')
							->leftJoin('pr_providers as p', 'pu_comments.pr_provider_id', '=', 'p.id')
							->leftJoin('pr_types as prt', 'p.pr_type_id', '=', 'prt.id')
							->select('pu_comments.*', DB::raw('CONCAT("' . asset('') . '", u.picture) AS picture_user'), DB::raw('CONCAT("' . asset('') . '", p.picture_face) AS picture_provider'), DB::raw('CONCAT(u.name, " ", u.lastname) AS name_user'), 'p.name_provider', 'prt.name_type as name_type_provider', 'p.ranking as score', 'prt.id as id_type_provider')
							->where('ads.id', '=', $ads_id)
							->where('u.flagactive', '=', 1)
							->where('pu_comments.flagactive', '=', 1)
							->skip($this->perpage * ($page - 1))
							->orderBy('pu_comments.datecreate', 'desc')->take($this->perpage)->get();
			$dataFinish = $data->toArray();
			if ($dataFinish) {
				foreach ($dataFinish as $value) {
					$valueFinal = [
						"id" => $value["id"],
						"pu_ad_id" => $value["pu_ad_id"],
						"user_id" => $value["user_id"],
						"description" => $value['description'],
						"picture" => $value['picture'],
						"lastupdate" => $value['lastupdate'],
						"datecreate" => $value["datecreate"],
						"flagactive" => $value["flagactive"],
						"picture_user" => $value["picture_user"],
						"name_user" => $value["name_user"],
					];
					if ($value['pr_provider_id']) {
						$score = PrScore::wherePrProviderId($value['pr_provider_id'])->select(DB::raw('count(id) as score'))->get();
						$EstadoTipo = ($value['name_type_provider'] == PrProviders::Type_Inactivo) ? "0" : "1";
						$valueFinal['provider'] = [['pr_provider_id' => $value['pr_provider_id'],
						'name_provider' => $value['name_provider'],
						'id_type_provider' => $value['id_type_provider'],
						'name_type_provider' => $value['name_type_provider'],
						'approved' => $EstadoTipo,
						"total_users" => $score[0]->score,
						"score" => $value["score"],
						'picture_provider' => $value['picture_provider']]];
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

	public function CommentsForUser($idUser=null,$idPost=null) {
		$table = PuComments::join('pu_ads as ads', 'pu_comments.pu_ad_id', '=', 'ads.id')
				->join('users as u', 'pu_comments.user_id', '=', 'u.id')
				->leftJoin('pr_providers as p', 'pu_comments.pr_provider_id', '=', 'p.id')
				->leftJoin('pr_types as prt', 'p.pr_type_id', '=', 'prt.id')
				->select('pu_comments.*', DB::raw('CONCAT("' . asset('') . '", u.picture) AS picture_user'),
						DB::raw('CONCAT("' . asset('') . '", p.picture_face) AS picture_provider'),
						DB::raw('CONCAT("' . asset('') . '", pu_comments.picture) AS picture'),
						DB::raw("(if(pu_comments.flagactive='1','Activo',(if(pu_comments.flagactive='0','Inactivo','-')))) as flagactive"),
						DB::raw("(if(pu_comments.flagactive='1','lock',(if(pu_comments.flagactive='0','unlock','-')))) as estado"), 
						DB::raw('CONCAT(u.name, " ", u.lastname) AS name_user'), 'p.name_provider',
						'prt.name_type as name_type_provider',
						'u.name as nameUser',
						'p.ranking as score', 'prt.id as id_type_provider');
				
				if($idUser){
					$table=$table->where('pu_comments.user_id', '=', $idUser);

				}
				if($idPost){
					$table=$table->where('pu_comments.pu_ad_id', '=', $idPost);

				}
//                            ->where('u.flagactive', '=', 1)
//				->where('pu_comments.flagactive', '=', 1)
				$table=$table->orderBy('pu_comments.flagactive', 'desc')
				->orderBy('pu_comments.datecreate', 'desc');
		return $table;
	}

}
