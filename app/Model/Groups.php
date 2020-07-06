<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Groups extends Model {

	protected $table      = 'groups';
	protected $primaryKey = 'id';
	public $timestamps    = true;
    
	public function users() {
       	return $this->hasMany('App\Model\Users', 'id_group', 'id');
    }


}
