<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model as M;


class Employee extends Model {

	protected $table      = 'employees';
	protected $primaryKey = 'id';
	public $timestamps    = true;
	protected $guarded = [];

	public function task()
	{
	    return $this->hasMany(M\Task::class);
	}
    


}
