<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model as M;


class Task extends Model {

	protected $table      = 'tasks';
	protected $primaryKey = 'id';
	public $timestamps    = true;
	protected $guarded = [];

	public function employee()
	{
	    return $this->belongsTo('App\Model\Employee', 'id_employee', 'id');
	}


}
