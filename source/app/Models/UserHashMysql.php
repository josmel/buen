<?php //

/*namespace App\Models;

class UserHash extends BaseModel {

	protected $table = 'users_hash';
	protected $fillable = ['user_id', 'idfacebook', 'name', 'url'];

	public function GetFriendFacebook($name, $url, $idfacebook, $idUser) {
		try {
			$UserName = UserHash::whereName($name)->first();
			$Url = UserHash::whereUrl($url)->first();
			$UserHash = UserHash::whereUserId($idUser)->first();
			if ($UserHash) {
				$modelHash = UserHash::find($UserHash->id);
				$modelHash->update([
					'idfacebook' => $idfacebook,
					'url' => $url,
					'name' => $name]);
			} else {
				if ($UserName && !$Url) {
					$modelHash = UserHash::find($UserName->id);
					$modelHash->update(['url' => $url, 'user_id' => $idUser,
						'idfacebook' => $idfacebook]);
				} elseif (!$UserName && $Url) {
					$modelHash = UserHash::find($Url->id);
					$modelHash->update(['name' => $name, 'user_id' => $idUser,
						'idfacebook' => $idfacebook]);
				} elseif (!$UserName && !$Url) {
					UserHash::create([
						'user_id' => $idUser,
						'idfacebook' => $idfacebook,
						'url' => $url,
						'name' => $name
					]);
				} elseif ($UserName && $Url) {
					$modelHash = UserHash::find($Url->id);
					$modelHash->update(['user_id' => $idUser,
						'idfacebook' => $idfacebook]);
				}
			}

			$result = 1;
		} catch (Exception $exc) {
			$result = 0;
			echo $exc->getTraceAsString();
		}
		return $result;
	}

}
