<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Postgres extends Model {


    protected $connection = 'pgsql';
    protected $table = 'edges';
    protected $fillable = ['point1', 'point2'];
	public $timestamps = false;

	
}
