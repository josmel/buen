<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller,
	App\Models\PuAds,
		Illuminate\Http\Request,
	App\Models\PuTypes,
		DB,
	Illuminate\Support\Facades\Mail;


class HomeController extends Controller {

	public function getIndex() {
		return $this->renderView('admin.home.index');
	}

	public function index() {
//		$datos = DB::select("call post_popular(7,2)");
		$modelSubsidiary = new PuAds();

		$listPremiumAds_ = $modelSubsidiary->getAllAds(null,null,null,1,PuTypes::TYPE_PREMIUM);
		$listPremiumAds_[0]['detalle']=asset('') .'admpanel/publication/form/'.$listPremiumAds_[0]['id'];
		$listPublishAds_ = $modelSubsidiary->getPublishAds_count();
		$listSessions_ = $modelSubsidiary->getSessions_count();

		$visits = new \stdClass();
		$visits->viewers['Día'] = (int)$listSessions_->day_;
		$visits->viewers['Semana'] = (int)$listSessions_->week_;
		$visits->viewers['Mes'] = (int)$listSessions_->month_;

		$visits->posts['Día'] = (int)$listPublishAds_->day_;
		$visits->posts['Semana'] = (int)$listPublishAds_->week_;
		$visits->posts['Mes'] = (int)$listPublishAds_->month_;

		$listPremiumAds_ = json_encode($listPremiumAds_);
		$visits = json_encode($visits);

		return $this->renderView('admin.home.index', compact('listPremiumAds_', 'visits'));
	}

	public function resetPassword() {

		try {

			$email = ((isset($_GET['email'])) ? $_GET['email'] : FALSE);
     		$html = ":)";
	        $request = new \stdClass();
	        $request->message = "Reestablecer Contraseña";
	        $request->email = $email;
	        $request->subject = "Buen Dato";
	        $request->body = $html;

	        Mail::raw($request->message, function($message) use ($request)
	        {
	            $message->from('no_reply@onlinestudioproductions.com', 'BUEN DATO');
	            $message->to($request->email)->subject($request->subject)->setBody($request->body, 'text/html');;
	        });

        	return json_encode(true);

    	} catch (Exception $e) {
    		return json_encode(false);
    	}

    }
}