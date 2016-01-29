<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class UserHash extends Model {

	protected $connection = 'pgsql';
	protected $table = 'nodes';
	protected $fillable = ['id','fullname', 'picture', 'iduser', 'idfacebook', 'tokendevice', 'typedevice'];
	public $timestamps = false;

	public function GetFriendFacebook($tokendevice, $typedevice, $name, $url, $idfacebook, $idUser) {
		try {
			$UserName = UserHash::whereFullname($name)->first();
			$Url = UserHash::wherePicture($url)->first();
			$UserHash = UserHash::whereIduser($idUser)->first();
			if ($UserHash) {
				$idHash = $UserHash->id;
			} else {
				if ($UserName && !$Url) {
					$idHash = $UserName->id;
				} elseif (!$UserName && $Url) {
					$idHash = $Url->id;
				} elseif ($UserName && $Url) {
					$idHash = $Url->id;
				} else {
					$lastIdHash = UserHash::create([
								'iduser' => $idUser,
								'idfacebook' => $idfacebook,
								'picture' => $url,
								'fullname' => $name,
								'tokendevice' => $tokendevice,
								'typedevice' => $typedevice
					])->id;
				$idHash = $lastIdHash;
				}
			}
			$modelHash = UserHash::find($idHash);
			$modelHash->update([
				'idfacebook' => $idfacebook,
				'url' => $url,
				'name' => $name,
				'tokendevice' => $tokendevice,
				'typedevice' => $typedevice
					]
			);
			$result = 1;
		} catch (Exception $exc) {
			$result = 0;
			echo $exc->getTraceAsString();
			exit;
		}
		return $result;
	}

}
