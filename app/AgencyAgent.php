<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * AgencyAgent
 * @author Miguel Lara Jareda <miguel.lara@outlook.com>
 * @package App\Models
 */
class AgencyAgent extends Model {

protected $connection = 'db2';

	/**
	 * @var String $table
	 */
	protected $table = 'agencies_agents';

	/**
	 * @var mixed $hidden
	 */
	protected $hidden = [
		'agency_id',
		'active',
		'password',
		'state_id',
		'city_id',
		'created_at',
		'updated_at',
		'deleted_at',
	];

	/**
	 * @var mixed $fillable
	 */
	protected $fillable = [
		'email',
		'first_name',
		'last_name',
		'birthday',
		'street',
		'state_id',
		'city_id',
		'postal_code',
		'colony',
		'lada',
		'phone',
		'celphone',
		'fax',
		'mailing'
	];

	/**
	 * @var mixed $casts
	 */
	protected $casts = [
		'mailing' => 'boolean'
	];

	/**
	 * getAgencyRfcReferenceAttribute
	 * @return Illuminate\Database\Eloquent
	 */
	public function getAgencyRfcReferenceAttribute ($value) {

		return strtoupper($value);
	}

	/**
	 * state
	 * @return Illuminate\Database\Eloquent
	 */
	public function state () {

		return $this->belongsTo('App\Models\State', 'state_id');
	}

	/**
	 * city
	 * @return Illuminate\Database\Eloquent
	 */
	public function city () {

		return $this->belongsTo('App\Models\City', 'city_id');
	}

	/**
	 * session
	 * @return Illuminate\Database\Eloquent
	 */
	public function session () {

		return $this->hasOne('App\Models\Session');
	}

	/**
	 * agency
	 * @return Illuminate\Database\Eloquent
	 */
	public function agency () {

		return $this->belongsTo('App\Models\Agency');
	}


	public function puntoVenta () {

		return $this->hasOne('App\Models\PuntosVenta', 'Mail', 'email');
	}

	/**
	 * log
	 * @return Illuminate\Database\Eloquent
	 */
	public function log () {

		return $this->hasMany('App\Models\Backlog', 'user_id')
			->where('event', '=', 'SystemEvent')
			->limit(10)
			->orderBy('created_at', 'DESC');
	}

}
