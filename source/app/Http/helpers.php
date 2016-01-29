<?php

Use App\Models\Permission;

//use Route;
use App\Models\Role;

if (!function_exists('viewcMenu')) {

    function viewcMenu() {
        $user = Auth::admin()->user();
        $roles = Role::all();
        foreach ($roles as $value) {
            if ($user->hasRole($value->name)) {
                $dataPermission = Permission::join('permission_role as p', 'permissions.id', '=', 'p.permission_id')
                                ->select('permissions.*')
                                ->where('p.role_id', '=', $value->id)
                                ->get()->toArray();
                foreach ($dataPermission as $value) {
                    if ($user->can($value['name'])) {
                        $menu[] = ['name' => $value['description'], 
							'modulo' => $value['modulo'],
							'controller' => $value['name']];
                    }else{
                         echo "<script language='JavaScript'>history.back(alert('No tienes acceso para esta pagina'));</script>";exit;
                    }
                }
                return $menu;
            }
        }
    }

    //namespace App\Http\Helper {
    if (!function_exists('viewc')) {

        /**
         * Get the evaluated view contents for the given view.
         *
         * @param  string  $view
         * @param  array   $data
         * @param  array   $mergeData
         * @return \Illuminate\View\View
         */
        function viewc($view = null, $data = array(), $mergeData = array()) {
            $router = Route::getCurrentRoute()->getActionName();
            $module = substr($router, strripos($router, 'Controllers\\') + 12, (strrpos($router, '\\') - (strripos($router, 'Controllers\\') + 12)));
            $controller = substr($router, strripos($router, '\\') + 1, (strpos($router, 'Controller@')) - (strripos($router, '\\') + 1));
            $action = substr($router, strpos($router, '@') + 1);
            $route = ['module' => $module,
                'controller' => $controller,
                'action' => $action,
            ];
            $data = array_merge($data, $route);
            $factory = app('Illuminate\Contracts\View\Factory');
            if (func_num_args() === 0) {
                return $factory;
            }
            return $factory->make($view, $data, $mergeData);
        }

    }
}