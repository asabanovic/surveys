<?php

namespace Asabanovic\Surveys\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SurveyDocument extends Eloquent
{
    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $guarded = ['id'];

    /**
     * Retrieve the object that wrote the question
     * 
     * @return Relation 
     */
    public function owner()
    {
        return $this->morphTo();
    }

    /**
     * Define a relationship between the document and a survey
     * 
     * @return Relation 
     */
    public function survey()
    {
    	return $this->hasOne('Asabanovic\Surveys\Model\Survey');
    }
}
