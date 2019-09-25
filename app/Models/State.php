<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * State
 * @author Miguel Lara Jareda <miguel.lara@outlook.com>
 * @package App\Models
 */
class State extends Model {

	/**
	 * @var String $table
	 */
	protected $table = 'states';

	/**
	 * @var Mixed $hidden
	 */
	protected $hidden = ['country_id'];

	/**
	 * @var Boolean $timestamps
	 */
	public $timestamps = false;

}
