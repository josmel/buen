<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller,
	App\Http\Requests\Admin\FormAdminRequest,
	App\Models\User,
	App\Models\Role,
	App\Models\PuComments,
	App\Models\PuAds,
	App\Models\RoleUser,
	Hash,
	Illuminate\Http\Request,
	Datatables,
	DB;

class UserController extends Controller {

	const NAMEC = 'user';
	const NAMEC_PUBLICATION = 'publication';

	public function getIndex() {
		return viewc('admin.' . self::NAMEC . '.index');
	}

	public function getPosts($idUser) {
		$dataUser = User::find($idUser);
		return viewc('admin.' . self::NAMEC . '.posts', compact('dataUser'));
	}

	public function getListPosts(Request $request, $idUser) {
		try {
			$PuPosts = new PuAds();
			$table = $PuPosts->PostForDataTable($idUser,null);
			$datatable = Datatables::of($table)
					->editColumn('picture_publication', '<img src="{{$picture_publication}}" heigth=64" width="64" />')
					->addColumn('action', function($table) {
				return '<a href="/admpanel/' . self::NAMEC_PUBLICATION . '/form/' . $table->id . '/'.self::NAMEC.'|posts|'.$table->idUser.'" class="btn-actions icon icon-pen"></a>
				<a href="javascript:;" data-url="/admpanel/' . self::NAMEC_PUBLICATION . '/delete/' . $table->id . '" class="btn-actions icon icon-' . $table->estado . ' js-change-confirm" title="' . $table->estado . '" data-status="' . $table->estado . '" data-id="' . $table->id . '" ></a>';
			});
			return $datatable->make(true);
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
			exit;
		}
	}

	public function getListComments(Request $request, $idUser) {
		try {
			$PuCOmments = new PuComments();
			$table = $PuCOmments->CommentsForUser($idUser,null);
			$datatable = Datatables::of($table)
					->editColumn('picture', '<img src="{{$picture}}" heigth=64" width="64" />')
					->addColumn('action', function($table) {
				return '<a href="/admpanel/' . self::NAMEC_PUBLICATION . '/form-comment/' . $table->id . '/' . self::NAMEC . '|comments|' . $table->user_id . '" class="btn-actions icon icon-pen"></a>'
						. '
				<a href="javascript:;" data-url="/admpanel/' . self::NAMEC_PUBLICATION . '/delete-comments/' . $table->id . '" class="btn-actions icon icon-' . $table->estado . ' js-change-confirm" title="' . $table->estado . '" data-status="' . $table->estado . '" data-id="' . $table->id . '" ></a>';
			});
			return $datatable->make(true);
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
			exit;
		}
	}

	public function getComments($idUser) {
		$dataUser = User::find($idUser);
		return viewc('admin.' . self::NAMEC . '.comments', compact('dataUser'));
	}

	public function getForm($id) {
		if (isset($id) && $id != '') {
			$msgform = (!empty($id)) ? 'Contraseña(dejar en blanco si no ha de cambiar' : 'Contraseña';
			$dataUser = User::find($id);
			if (!isset($dataUser)) {
				$dataUser = new User();
			}
		} else {
			return viewc('admin.' . self::NAMEC . '.index');
		}

		return viewc('admin.' . self::NAMEC . '.form', compact('dataUser', 'msgform'));
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
			return redirect(action('Admin\UserController@getIndex'))->with('messageSuccess', $msg);
		} catch (Exception $exc) {
			dd($exc->getMessage());
		}
	}

	public function getList(Request $request) {
		$dataUser= new User();
		$table= $dataUser->UserForDatatable(User::ROL_USER_APP);
		$datatable = Datatables::of($table)
					->editColumn('picture', '<img src="{{$picture}}" heigth=64" width="64" />')
				->addColumn('action', function($table) {
			return '<a alt="Editar" href="/admpanel/' . self::NAMEC . '/form/' . $table->id . '" class="btn-actions icon icon-pen"></a>
				<a href="javascript:;" data-url="/admpanel/' . self::NAMEC . '/delete/' . $table->id . '" class="btn-actions icon icon-' . $table->estado . ' js-change-confirm" title="' . $table->estado . '" data-status="' . $table->estado . '" data-id="' . $table->id . '" ></a>
				<a alt="Publicaciones" title="Publicaciones" href="/admpanel/' . self::NAMEC . '/posts/' . $table->id . '" class="btn-actions icon icon-posts"></a>
					<a alt="Comentarios"  title="Comentarios" href="/admpanel/' . self::NAMEC . '/comments/' . $table->id . '" class="btn-actions icon icon-comments"></a>';
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
			$user = User::whereId($id)->first();
			$flagactive = ($user->flagactive == 0) ? 1 : 0;
			$user->update(['id' => $id, 'flagactive' => $flagactive]);
			$result['state'] = 1;
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