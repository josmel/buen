<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
	App\Models\PushNotification,
	App\Models\User,
	DB,
	Config;

class RequestNotification extends Controller {

	const ACTIVO = 1; //
	const COMMMENT = 1; //
	const POST = 2; //

	public function setNotification($user_id, $post_id, $type, $subject = null) {
		try {
			$DataUser = User::find($user_id);
			$userName = $DataUser->name . ' ' . $DataUser->lastname;
			PushNotification::create([
				'type_id' => PushNotification::PUSH,
				'platform_id' => $DataUser->typedevice,
				'user_id' => $DataUser->id,
				'app_id' => Config::get('app.APP_ID'),
				'token' => \md5(\uniqid(\time())),
				'description' => $this->description($userName, $post_id, $type),
				'appname' => Config::get('app.APP_NAME'),
				'dbconfig' => Config::get('app.DB_CONFIG'),
				'params' => json_encode(['subject' => $subject, 'emailfrom' => Config::get('app.APP_EMAIL_FROM'), 'for' => $DataUser->email]),
				'tosend' => $DataUser->tokendevice,
				'to' => $userName,
				'from' => Config::get('app.APP_EMAIL_FROM_NAME'),
				'flagsend' => 0,
				'flagactive' => self::ACTIVO,
			]);
			return ['state' => 1, 'msg' => 'ok', 'data' => null];
		} catch (\Exception $exc) {
			DB::rollback();
			return ['state' => 0, 'msg' => $exc->getMessage(), 'data' => null];
		}
	}

	public function description($userName, $post_id, $type) {
		date_default_timezone_set('America/Lima');
		$cuerpo = ['description' => $userName . ' ' . Config::get('app.MESSAGE.' . $type), 'id' => $post_id, 'type' => $type];
		return json_encode($cuerpo);
	}

}
