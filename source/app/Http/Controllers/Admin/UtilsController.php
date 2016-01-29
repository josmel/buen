<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\ControllerWS;
use App\Models\PuAds;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;
use App\Models\User;

header('Content-Type: application/json');

header("Access-Control-Allow-Origin: *");


class UtilsController extends ControllerWS
{
    public function resetPassword(){
                
        $email = ((isset($_GET['email'])) ? $_GET['email'] : FALSE);
        $validate_email = (filter_var($email, FILTER_VALIDATE_EMAIL) !== false);

        if ($validate_email) {
            # code...

            $email_exist = new User();
            $email_exist = $email_exist->emailExist($email);

            if ($email_exist) {
                # code...
                try {
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

                    $result['status'] = ($validate_email);
                    $result['message'] = ('El correo fue enviado con éxito.');
                    return ($result);

                } catch (Exception $e) {                    
                    $result['status'] = ($validate_email);
                    $result['message'] = ('Hubo un error en el envío del correo.');
                    return ($result);
                }
            }
            else
            {
                    $result['status'] = (false);
                    $result['message'] = ('El correo no es válido.');
                    return ($result);
            }          
        }
        else {
            # code...
            $result['status'] = ($validate_email);
            $result['message'] = ('Ingrese un correo válido.');
            return ($result);     
        }
    }
}
