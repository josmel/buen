<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable,
    Illuminate\Auth\Passwords\CanResetPassword,
    Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract,
    Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract,
    Zizaco\Entrust\Traits\EntrustUserTrait;

use DB;

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable,
        CanResetPassword,
        EntrustUserTrait;

    protected $fillable = ['name', 'lastname', 'flagactive', 'password', 'email', 'picture', 'idfacebook','tokendevice', 'typedevice', 'flagterms'];
    protected $table = 'users';

    const table = 'users';

    protected $hidden = ['password'];

    const STATE_USER_ACTIVE = 1;
    const STATE_USER_INACTIVE = 0;
    const ROL_SUPER_ADMIN = 'user_admin';
    const ROL_CONTENIDO_ADMIN = 'user_content';
    const ROL_USER_APP = 'user_app';
    

    public function getRememberToken() {
        return null; // not supported
    }

    public function setRememberToken($value) {
        // not supported
    }

    public function getRememberTokenName() {
        return null; // not supported
    }

    public function setAttribute($key, $value) {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute) {
            parent::setAttribute($key, $value);
        }
    }

    public function emailExist($email){
        $validation = DB::select("select count(*) as count from users where email = '$email';");
        return $validation[0]->count;
    }

	
	
	public function UserForDatatable($nameRol) {
			$table = User::join('role_user as ru', 'users.id', '=', 'ru.user_id')
				->join('roles as r', 'ru.role_id', '=', 'r.id')
				->select(
						'users.name','users.lastname',
						'users.idfacebook as idfacebook', 'users.picture',
						DB::raw("(if(users.flagactive='1','Activo',(if(users.flagactive='0','Inactivo','-')))) as flagactive"),
						DB::raw("(if(users.flagactive='1','lock',(if(users.flagactive='0','unlock','-')))) as estado"), 
						'users.email as email', 'users.id as id')
				->whereNull('users.datedelete')
				->Where('r.name', '=', $nameRol);
		return $table;
	}
	
}
