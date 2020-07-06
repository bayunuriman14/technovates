<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Users extends Model {

	protected $table      = 'users';
	protected $primaryKey = 'id';
	public $timestamps    = true;
	protected $guarded=[];

	public function groups() {
        	return $this->belongsTo('App\Model\Groups', 'id_group', 'id');
    }
    


}
