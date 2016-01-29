<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Route;

abstract class ControllerW extends BaseController {

    use DispatchesCommands,
        ValidatesRequests;

    public function __construct() { 
    }

    protected $alpha;
    protected $data = [];
    private $route;

    private function getAction() {
        $index = strpos($this->route, '@') + 1;
        return substr($this->route, $index);
    }

    private function getController() {
        $finish = strpos($this->route, 'Controller@');
        $start = strripos($this->route, '\\') + 1;
        return substr($this->route, $start, $finish - $start);
    }

    private function alpha() {
        return [
            'controller' => $this->getController(),
            'action' => $this->getAction(),
        ];
    }

    protected function choreValue($key = null, $value = null) {
        if (isset($key) && isset($value)) {
            $data = array($key => $value);
            $this->data = array_merge($this->data, $data);
        } else {
            throw new Exception('Key should not be null');
        }
    }

    protected function renderView($view = null, $data = array(), $mergeData = array()) {
        $this->route = Route::getCurrentRoute()->getActionName();
        $data = array_merge($data, $this->alpha());
        $factory = app('Illuminate\Contracts\View\Factory');
        if (func_num_args() === 0) {
            return $factory;
        }

        return $factory->make($view, $data, $mergeData);
    }
    


}
