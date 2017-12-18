<?php

namespace Asabanovic\Surveys\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Survey extends Eloquent
{
    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $guarded = ['id'];

    /**
     * Retrieve all comments for this event
     * 
     * @return Collection 
     */
    public function questions()
    {
    	return $this->belongsToMany('Asabanovic\Surveys\Model\SurveyQuestions', 'question_survey');
    }

    /**
     * Define a relationship between the survey and an aswer
     * 
     * @return Relation 
     */
    public function answers()
    {
    	return $this->hasMany('Asabanovic\Surveys\Model\SurveyAnswers');
    }

    /**
     * Define a relationship between the survey and a contact
     * 
     * @return Relation 
     */
    public function contacts()
    {
    	return $this->hasMany('Asabanovic\Surveys\Model\SurveyContact');
    }

    /**
     * Retrieve the object who created the survey (Possibily a user)
     * 
     * @return Relation 
     */
    public function creator()
    {
        return $this->morphTo();
    }
}
