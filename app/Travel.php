<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
  protected $conn = 'db3';

  protected $fillable = [
      'mt',
      'name',
      'slug',
      'department',
      'days',
      'nights',
      'price_from',
      'taxes',
      'validity',
      'departure_date',
      'include',
      'not_include',
      'itinerary',
      'currency',
      'rooms_id',
      'price_table',
      'hotels_table',
      'additional_notes',
      'operator',
      'circuit',
      'status',
  ];

    public function departments()
    {
    return $this->belongsTo(Department::class);
    }

    /*public function deptos()
      {
      return $this->hasMany(Department::class, 'code', 'department');
    }*/

    public function deptos()
    {
    return $this->belongsTo(Department::class, 'department', 'code');
    }

    public function operators()
    {
    return $this->belongsTo(Operator::class, 'operator', 'code');
    }

    public function airlines()
    {
      return $this->belongsToMany(Airline::class, 'airline_travel', 'travel_mt', 'airline_code_iata', 'mt', 'code_iata');
    }

    public function countries()
    {
      return $this->belongsToMany(Country::class, 'country_travel', 'travel_mt', 'country_code_iata', 'mt', 'code_iata');
    }

    public function cities()
    {
      return $this->belongsToMany(City::class, 'city_travel', 'travel_mt', 'city_id', 'mt', 'id');
    }

    public function multimedia()
    {
      return $this->belongsToMany(Multimedia::class, 'multimedia_travel', 'travel_mt', 'multimedia_id', 'mt', 'id');
    }

    public function tours()
    {
      return $this->belongsToMany(Tour::class, 'tour_travel', 'travel_mt', 'tour_id', 'mt', 'id');
    }

    public function seasons()
    {
      return $this->belongsToMany(Season::class, 'season_travels', 'travel_mt', 'season_code_season', 'mt', 'code_season');
    }

    public function sections()
    {
      return $this->belongsToMany(Section::class, 'section_travels', 'travel_mt', 'section_id', 'mt', 'id');
    }

    public function currencies()
    {
      return $this->belongsTo(Currency::class);
    }

    public function rooms()
    {
      return $this->belongsTo(Room::class);
    }

    public function offers()
    {
      return $this->belongsToMany(Offer::class);
    }

    public function top_travels()
    {
      return $this->belongsToMany(TopTravel::class);
    }

    public function filters()
    {
      return $this->belongsToMany(Filter::class, 'filter_travel', 'travel_mt', 'filter_id', 'mt', 'id');
    }

    public function scopeSearch($query, $name)
    {
      if (trim($name) != "") {
        $query->where(\DB::raw("CONCAT(mt, ' ',name)"), "LIKE", "%$name%");
      }
    }

}
