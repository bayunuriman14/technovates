<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Page extends Model {

	protected $table      = 'pages';
	protected $primaryKey = 'id';
	public $timestamps    = true;
	protected $guarded = [];
    


}
