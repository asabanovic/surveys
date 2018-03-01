<?php

namespace Asabanovic\Surveys\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SurveyDocument extends Eloquent
{
	/*
	WE WILL REFACTOR THIS (MAYBE EVEN REMOVE) BECAUSE SURVEY DOCUMENTS WILL FIT INTO APPLICATION ATTACHMENTS
	THEY WILL JUST NEED TO SET A SURVEY-FLAG
	 */
	
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
