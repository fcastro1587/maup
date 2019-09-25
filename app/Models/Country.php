<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Country
 * @author Miguel Lara Jareda <miguel.lara@outlook.com>
 * @package App\Models
 */
class Country extends Model {

	/**
	 * @var String $table
	 */
	protected $table = 'countries';

	/**
	 * @var Boolean $timestamps
	 */
	public $timestamps = false;

}
