<?php

namespace App\Models;

use DB,
 App\Models\User;

class PrComments extends BaseModel {

	const table = 'pr_comments';

	protected $table = 'pr_comments';
	protected $fillable = ['pr_provider_id', 'user_id', 'description', 'punctuation', 'flagactive', 'picture'];
	
	 const STATE_COMMENT_ACTIVE = 1;
    const STATE_COMMENT_INACTIVE = 0;

	public function getAllCommentForProvider($pr_provider_id, $page) {
		try {
			$data = PrComments::join('pr_providers as p', 'pr_comments.pr_provider_id', '=', 'p.id')
					->join('users as u', 'pr_comments.user_id', '=', 'u.id')
					->select('pr_comments.*', DB::raw('CONCAT("' . asset('') . '", u.picture) AS picture_user'), DB::raw('CONCAT("' . asset('') . '", pr_comments.picture) AS picture_comment'), DB::raw('CONCAT(u.name, " ", u.lastname) AS name_user'))
					->where('p.id', '=', $pr_provider_id)
					->where('u.flagactive', '=',User::STATE_USER_ACTIVE)
					->where('pr_comments.flagactive', '=',  PrComments::STATE_COMMENT_ACTIVE)
					->skip($this->perpage * ($page - 1))
					->orderBy('pr_comments.datecreate', 'desc')
					->take($this->perpage)
					->get();
			$dataFinish = $data->toArray();
			return $dataFinish;
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
			exit;
		}
	}

	public function AllCommentForProviderForDataTable($pr_provider_id) {
		try {
			$data = PrComments::join('pr_providers as p', 'pr_comments.pr_provider_id', '=', 'p.id')
					->join('users as u', 'pr_comments.user_id', '=', 'u.id')
					->select('pr_comments.*', DB::raw('CONCAT("' . asset('') . '", u.picture) AS picture_user'),
							DB::raw('CONCAT("' . asset('') . '", pr_comments.picture) AS picture_comment'), 
							'u.name','u.lastname',
					    DB::raw("(if(pr_comments.flagactive='1','Activo',(if(pr_comments.flagactive='0','Inactivo','-')))) as flagactive"),
						DB::raw("(if(pr_comments.flagactive='1','lock',(if(pr_comments.flagactive='0','unlock','-')))) as estado"))
					->where('p.id', '=', $pr_provider_id)
					->where('u.flagactive', '=',User::STATE_USER_ACTIVE)
//					->where('pr_comments.flagactive', '=', 1)
					->orderBy('pr_comments.datecreate', 'desc');
			return $data;
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
			exit;
		}
	}

}
