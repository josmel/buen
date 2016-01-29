<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller,
	App\Http\Requests\Admin\FormAdminRequest,
	App\Models\User,
	App\Models\Role,
	App\Models\RoleUser,
	Hash,
	Illuminate\Http\Request,
	Datatables,
	DB;

class AdminController extends Controller {

	const NAMEC = 'admin';

	public function getIndex() {
		return viewc('admin.' . self::NAMEC . '.index');
	}

	public function getForm($id = null) {
		$msgform = (!empty($id)) ? 'Contraseña(dejar en blanco si no ha de cambiar' : 'Contraseña';
		$dataAdmin = User::find($id);
		if (!isset($dataAdmin)) {
			$dataAdmin = new User();
		}
		return viewc('admin.' . self::NAMEC . '.form', compact('dataAdmin', 'msgform'));
	}

	public function postForm(FormAdminRequest $request) {
		try {
			$dataAdmin = $request->all();
			$password = $request->get('password', null);
			if (isset($dataAdmin['id']) && $dataAdmin['id'] != '') {
				$data = $request->except(array('password'));
				$runtime = User::find($dataAdmin['id']);
				$runtime->fill($data);
				$runtime->password = $runtime->password;
				if (!empty($password)) {
					$runtime->password = Hash::make($password);
				}
				$runtime->save();
				$msg = 'Usuario Editado!';
			} else {
				$role = Role::whereName(User::ROL_CONTENIDO_ADMIN)->first();
				$dataAdmin['password'] = Hash::make($password);
				$NewUser = User::create($dataAdmin);
				$msg = 'Usuario Guardado!';
				RoleUser::create(['user_id' => $NewUser->id,
					'role_id' => $role->id]);
			}
			return redirect(action('Admin\AdminController@getIndex'))->with('messageSuccess', $msg);
		} catch (Exception $exc) {
			dd($exc->getMessage());
		}
	}

	public function getList(Request $request) {
		$dataUser= new User();
		$table= $dataUser->UserForDatatable(User::ROL_CONTENIDO_ADMIN);
		$datatable = Datatables::of($table)
				->addColumn('action', function($table) {
			return '<a href="/admpanel/' . self::NAMEC . '/form/' . $table->id . '" class="btn-actions icon icon-pen"></a>
                <a href="javascript:;" data-url="/admpanel/' . self::NAMEC . '/delete/' . $table->id . '" class="btn-actions icon icon-' . $table->estado .' js-change-confirm"  data-status="' . $table->estado . '" data-id="' . $table->id . '" ></a>
                <a href="javascript:;" data-url="/admpanel/' . self::NAMEC . '/delete-finish/' . $table->id . '" class="btn-actions icon icon-trash js-delete-confirm" data-status="eliminar" data-id="' . $table->id . '" ></a>';
		});
		if ($keyword = $request->get('search')['value']) {
			$datatable->filterColumn('name', 'whereRaw', "users.name like ?", ["%{$keyword}%"]);
			$datatable->filterColumn('id', 'whereRaw', "users.id like ?", ["%{$keyword}%"]);
			$datatable->filterColumn('rol', 'whereRaw', "roles.name like ?", ["%{$keyword}%"]);
			$datatable->filterColumn('flagactive', 'whereRaw', "flagactive like ?", ["%{$keyword}%"]);
			$datatable->filterColumn('estado', 'whereRaw', "flagactive like ?", ["%{$keyword}%"]);
		}
		return $datatable->make(true);
	}

	public function getDelete($id) {
		$result = array('state' => 0, 'msg' => '');
		try {
			if (!$id)
				throw new \Exception("Id de Usuario vacio");
			if (!empty($id)) {
				$user = User::whereId($id)->first();
				$flagactive = ($user->flagactive == 0) ? 1 : 0;
				$user->update(['id' => $id, 'flagactive' => $flagactive]);
				$result['state'] = 1;
			}
		} catch (\Exception $e) {
			$result['msg'] = $e->getMessage();
		}

		return response()->json($result);
	}

	public function getDeleteFinish($id) {
		$result = array('state' => 0, 'msg' => '');
		try {
			if (!$id)
				throw new \Exception("Id de Usuario Inválido");
			User::whereId($id)->forceDelete();
			$result['state'] = 1;
		} catch (\Exception $e) {
			$result['msg'] = $e->getMessage();
		}

		return response()->json($result);
	}

}
