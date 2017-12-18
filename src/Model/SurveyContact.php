<?php

namespace Asabanovic\Surveys\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SurveyContact extends Eloquent
{
    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $guarded = ['id'];

    /**
     * Retrieve a possible object that is already tied to the system (existing in the system)
     * 
     * @return Relation 
     */
    public function contact()
    {
        return $this->morphTo();
    }

    /**
     * Retrieve the object that created this contact
     * 
     * @return Relation 
     */
    public function creator()
    {
        return $this->morphTo();
    }

    /**
     * Define a relationship between the contact and a survey
     * 
     * @return Relation 
     */
    public function survey()
    {
    	return $this->hasOne('Asabanovic\Surveys\Model\Survey');
    }
}
