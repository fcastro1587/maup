<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Agency
 * @author Miguel Lara Jareda <miguel.lara@outlook.com>
 * @package App\Models
 */
class Agency extends Model {

	/**
	 * @var String $table
	 */
	protected $table = 'agencies';

	/**
	 * @var Mixed $hidden
	 */
	protected $hidden = [
		'agency_agent_id',
		'agency_group_id',
		'active',
		'verified',
		'publish',
		'billing_country_id',
		'billing_state_id',
		'billing_city_id',
		'mailing',
		'tranfer',
		'activated_at',
		'confirm_at',
		'created_at',
		'updated_at',
		'deleted_at',
	];

	/**
	 * @var mixed $fillable
	 */
	protected $fillable = [
		'agency_group_id',
		'rfc',
		'name',
		'billing_name',
		'billing_address',
		'billing_country_id',
		'billing_state_id',
		'billing_city_id',
		'billing_colony',
		'billing_postal_code',
		'contact_name',
		'contact_mail',
		'contact_phone',
		'skype',
		'website',
		'social_facebook',
		'social_twitter',
		'social_instagram',
		'logotype',
		'mailing',
		'tranfer'
	];

	/**
	 * @var mixed $casts
	 */
	// protected $casts = [
	// 	'transfer' => 'boolean'
	// ];

	/**
	 * state
	 * @return Illuminate\Database\Eloquent
	 */
	public function state () {

		return $this->belongsTo('App\Models\State', 'billing_state_id');
	}

	/**
	 * city
	 * @return Illuminate\Database\Eloquent
	 */
	public function city () {

		return $this->belongsTo('App\Models\City', 'billing_city_id');
	}

	/**
	 * country
	 * @return Illuminate\Database\Eloquent
	 */
	public function country () {

		return $this->belongsTo('App\Models\Country', 'billing_country_id');
	}

	/**
	 * branch
	 * @return Illuminate\Database\Eloquent
	 */
	public function branchs () {

		return $this->hasMany('App\Models\AgencyBranch');
	}

}
