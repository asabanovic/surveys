<?php

namespace Asabanovic\Surveys\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Asabanovic\Surveys\Model\SurveyAnswer;

class SurveyQuestion extends Eloquent
{
    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $guarded = ['id'];

    /**
     * Retrieve the object that created the question
     * 
     * @return Relation 
     */
    public function creator()
    {
        return $this->morphTo();
    }

    /**
     * Retrieve all answers to this question
     * 
     * @return Collection 
     */
    public function answers()
    {
    	return $this->hasMany('Asabanovic\Surveys\Model\SurveyAnswer');
    }

    /**
     * Answer this question
     * 
     * @param SurveyAnswer $answer 
     */
    public function addAnswer(SurveyAnswer $answer)
    {
    	return $this->answers()->save($answer);
    }
}
