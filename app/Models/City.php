<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * City
 * @author Miguel Lara Jareda <miguel.lara@outlook.com>
 * @package App\Models
 */
class City extends Model {

	/**
	 * @var String $table
	 */
	protected $table = 'cities';

	/**
	 * @var Mixed $hidden
	 */
	protected $hidden = ['state_id'];

	/**
	 * @var Boolean $timestamps
	 */
	public $timestamps = false;

}
